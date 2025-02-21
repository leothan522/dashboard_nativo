<?php

namespace app\Controllers\web;
use app\Controllers\Controller;
use app\Middlewares\Middleware;
use app\Models\User;
use app\Providers\Auth;
use app\Providers\Mail;
use app\Providers\Rule;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register()
    {
        try {

            $rules = [
                'name'    => 'required|valid_name|max_len,50|min_len,3',
                'email'       => ['required','valid_email', 'unique' => Rule::unique('users', 'email')],
                'password'    => 'required|max_len,50|min_len,8',
            ];

            $messages = [
                'name' => [
                    'required' => 'El campo nombre es requerido.',
                    'valid_name' => 'El campo nombre debe contener un nombre humano válido.',
                    'max_len' => 'El campo nombre no puede tener más de 50 caracteres de longitud.',
                    'min_len' => 'El campo nombre debe tener al menos 3 caracteres de longitud.'
                ],
                'email' => [
                    'required' => 'El campo correo electrónico es requerido.',
                    'valid_email' => 'Correo electrónico no válido.'
                ],
                'password' => [
                    'required' => 'El campo contraseña es requerido.',
                    'max_len' => 'El campo contraseña no puede tener más de 50 caracteres de longitud',
                    'min_len' => 'El campo contraseña debe tener al menos 8 caracteres de longitud'
                ]

            ];

            $filter = [
                'name' => 'trim',
                'email' => 'sanitize_email'
            ];

            $this->validate($rules, $messages, $filter);

            $model = new User();
            $row = [];

            $this->VALID_DATA['password'] = password_hash($this->VALID_DATA['password'], PASSWORD_DEFAULT);

            //guardo en la database
            $data = array_values($this->VALID_DATA);
            $data[] = getRowquid($model);
            $row = $model->save($data);
            Auth::loginUsingId($row->id);
            $row->sendEmail = $this->sendVerifyEmail();
            $row->ok = true;
            return $this->json($row);


        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    public function login(){
        try {

            $rules = [
                'email'       => ['required', 'valid_email', 'unique' => !Rule::unique('users', 'email')],
                'password'    => 'required|max_len,50|min_len,8',
            ];

            $messages = [
                'email' => [
                    'required' => 'El campo correo electrónico es requerido.',
                    'valid_email' => 'Correo electrónico no válido.',
                    'unique' => 'El correo electrónico no se encuentra en nuestros registros.'
                ],
                'password' => [
                    'required' => 'El campo contraseña es requerido.',
                    'max_len' => 'El campo contraseña no puede tener más de 50 caracteres de longitud',
                    'min_len' => 'El campo contraseña debe tener al menos 8 caracteres de longitud'
                ]
            ];

            $filter = [
                'password' => 'trim',
                'email' => 'sanitize_email'
            ];

            $this->validate($rules, $messages, $filter);

            $model = new User();
            $row = [];

            $user = $model->where('email', $this->VALID_DATA['email'])->first();

            $db_password = $user->password;
            if (password_verify($this->VALID_DATA['password'], $db_password)){
                Auth::loginUsingId($user->id);
                $row = crearResponse(
                    'Bienvenido',
                    'Bienvenido',
                    'true',
                    'sussces'
                );
            }else{
                $row = crearResponse();
                $row['errors'] = ['password' => 'La contraseña es incorrecta.'];
            }

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function logout(): void
    {
        Auth::logout();
        redirect('login');
    }

    public function validateEmail()
    {
        Middleware::auth('/');

        if (Auth::user()->email_verified_at){
            redirect('/');
        }

        return $this->view('auth.verify-email');
    }

    public function expiredToken()
    {
        return $this->view('auth.validated-email', ['validate' => false, 'message' => 'hola']);
    }

    public function reenviarEmail()
    {
        try {

            $message = $this->sendVerifyEmail();
            if ($message == 'Email enviado.'){
                $ok = true;
            }else{
                $ok = false;
            }
            $response = crearResponse(
                $message,
                null,
                $ok
            );
            return $this->json($response);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function verifyEmail($token)
    {
        try {

            $model = new User();
            $existe = $model->where('two_factor_secret', $token)->first();
            if ($existe){
                $validate = true;
                //seguimos validando
                $hasta = Carbon::create($existe->two_factor_confirmed_at)->addDay();
                $hoy = Carbon::create(getFecha());

                if ($hasta->greaterThan($hoy)){
                    //procesamos
                    $data['email_verified_at'] = getFecha();
                }else{
                    $validate = false;
                }
                $data['two_factor_secret'] = null;
                $data['two_factor_confirmed_at'] = null;
                $model->update($existe->id, $data);
            }else{
                $validate = false;
            }

            return $this->view('auth.validated-email', [
                'validate' => $validate,

            ]);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    public function resetPasswordEmail($token)
    {
        try {
            $validate = false;
            $model = new User();
            $existe = $model->where('two_factor_recovery_codes', $token)->first();
            if ($existe){
                $validate = true;
                //seguimos validando
                $hasta = Carbon::create($existe->two_factor_confirmed_at)->addDay();
                $hoy = Carbon::create(getFecha());

                if ($hasta->greaterThan($hoy)){
                    //procesamos
                    $data['email_verified_at'] = getFecha();
                }else{
                    $validate = false;
                }
                $data['two_factor_secret'] = null;
                $data['two_factor_confirmed_at'] = null;
                $model->update($existe->id, $data);
            }

            if ($validate){
                $route = 'auth.reset-password';
                $data = [
                    'email' => $existe->email,
                    'token' => $token
                ];

            }else{
                $route = 'auth.validated-email';
                $data = [
                    'validate' => false
                ];
            }
            return $this->view($route, $data);


        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    public function forgotPassword()
    {
        try {
            $rules = [
                'email' => 'required|valid_email'
            ];

            $messages = [
                'email' => [
                    'required' => 'El campo correo electrónico es requerido.',
                    'valid_email' => 'Correo electrónico no válido.'
                ]
            ];

            $filter = [
                'email' => 'sanitize_email'
            ];

            $this->validate($rules, $messages, $filter);

            $model = new User();


            $existe = $model->where('email', $this->VALID_DATA['email'])->first();

            if ($existe){
                $response = $this->sendResetPassword($existe);
            }else{
                $response = crearResponse(
                    'El correo no se encuentra en nuestros registros.',
                    'Correo Inexistente',
                    false,
                    'warning',
                    true
                );
            }
            return $this->json($response);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function resetPassword()
    {
        try {
            $rules = [
                'password'    => 'required|max_len,50|min_len,8'
            ];

            $messages = [
                'email' => [
                    'required' => 'El campo correo electrónico es requerido.',
                    'valid_email' => 'Correo electrónico no válido.'
                ],
                'password' => [
                    'required' => 'El campo contraseña es requerido.',
                    'max_len' => 'El campo contraseña no puede tener más de 50 caracteres de longitud',
                    'min_len' => 'El campo contraseña debe tener al menos 8 caracteres de longitud'
                ]

            ];

            $filter = [
                'email' => 'sanitize_email'
            ];

            $this->validate($rules, $messages, $filter);

            $model = new User();
            $email = $this->VALID_DATA['email'];
            $token = $this->VALID_DATA['token'];
            $sql = "SELECT * FROM users WHERE email = '$email' AND two_factor_recovery_codes = '$token';";
            $user = $model->query($sql)->first();

            if ($user){
                $password = $this->VALID_DATA['password'] = password_hash($this->VALID_DATA['password'], PASSWORD_DEFAULT);

                $data = [
                    'password' => $password,
                    'two_factor_recovery_codes' => null,
                    'two_factor_confirmed_at' => null
                ];
                $model->update($user->id, $data);

                $response = crearResponse(
                    'Datos Actualizados Exitosamente',
                    'Datos Actualizados',
                    true,
                    'success'
                );
            }else{
                $response = crearResponse(
                    'token vencido',
                    'token vencido',
                    false,
                    'warning',
                    true
                );
                $response['errors'] = ['token' => 'El token es incorrecto'];
            }

            return $this->json($response);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    protected function sendVerifyEmail(): string
    {
        $response = '';
        try {
            Middleware::auth('/');
            $model = new User();
            $token = generarStringAleatorio(32, true);
            $data = [
                'two_factor_secret' => $token,
                'two_factor_confirmed_at' => getFecha()
            ];
            $model->update(Auth::user()->id, $data);

            $to = Auth::user()->email;
            $subject =  verUtf8('Correo de Verificación');
            $body =  $this->view('emails.verify', [
                'nombre' => mb_strtoupper(Auth::user()->name),
                'url' => route('verify/email/'.$token),
                'name' => env('MAIL_FROM_NAME', 'Dashboard Nativo'),
                'footer' => env('MAIL_FROM_FOOTER', '&copy; 2025 Dirección de Tecnología y Sistemas.'),
                'logo' => env('MAIL_FROM_LOGO', 'https://i.postimg.cc/sD12RS2c/logo-Photoroom-fotor-20250220111822.png')
            ]);

            Mail::sendMail($to, $subject, $body);
            $response = "Email enviado.";

        }catch (\Error|\Exception $e){
            $response = $e->getMessage();
        }
        return $response;
    }

    protected function sendResetPassword($user)
    {
        try {
            $model = new User();
            $token = generarStringAleatorio(32, true);

            $data = [
                'two_factor_recovery_codes' => $token,
                'two_factor_confirmed_at' => getFecha()
            ];

            $model->update($user->id, $data);

            $to = $user->email;
            $subject =  verUtf8('Recuperar Contraseña');
            $body =  $this->view('emails.reset', [
                'nombre' => $user->name,
                'url' => route('reset/password/'.$token),
                'name' => env('MAIL_FROM_NAME', 'Dashboard Nativo'),
                'footer' => env('MAIL_FROM_FOOTER', '&copy; 2025 Dirección de Tecnología y Sistemas.'),
                'logo' => env('MAIL_FROM_LOGO', 'https://i.postimg.cc/sD12RS2c/logo-Photoroom-fotor-20250220111822.png')
            ]);

            Mail::sendMail($to, $subject, $body);
            $response = crearResponse('email enviado', 'email enviado', true, 'success', true);
        }catch (\Error|\Exception $e){
            $response = $e->getMessage();
        }

        return $response;

    }


}