<?php

namespace app\Controllers\web;
use app\Controllers\Controller;
use app\Models\User;
use app\Providers\Auth;
use app\Providers\Mail;
use app\Providers\Rule;

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
            $body =  $this->view('emails.verify');
            $this->sendVerifyEmail($row->email, verUtf8('Correo de Verificación'), $body);
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

    protected function sendVerifyEmail($to, $subject, $body): string
    {
        $respopnse = '';
        try {
            Mail::sendMail($to, $subject, $body);
            $respopnse = "email enviado";
        }catch (\Error|\Exception $e){
            $respopnse = $e->getMessage();
        }
        return $respopnse;
    }

}