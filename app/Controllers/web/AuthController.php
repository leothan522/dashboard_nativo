<?php

namespace app\Controllers\web;
use app\Controllers\Controller;
use app\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        try {

            $rules = [
                'name'    => 'required|valid_name|max_len,50|min_len,3',
                'email'       => 'required|valid_email',
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

            $exite = $model->where('email', $this->VALID_DATA['email'])->first();

            if ($exite){
                //mando mesajes de error
                $row = crearResponse();
                $row['errors'] = ['email' => 'El correo electrónico ya se encuentra registrado.'];
            }else{
                //guardo en la database
                $data = array_values($this->VALID_DATA);
                $data[] = getRowquid($model);
                $row = $model->save($data);
                $row->ok = true;
            }

            return $this->json($row);


        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    public function login(){
        try {

            $rules = [
                'email'       => 'required|valid_email',
                'password'    => 'required|max_len,50|min_len,8',
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
                'password' => 'trim',
                'email' => 'sanitize_email'
            ];

            $this->validate($rules, $messages, $filter);

            $model = new User();
            $row = [];

            $exite = $model->where('email', $this->VALID_DATA['email'])->first();

            if (!$exite){
                //mando mesajes de error
                $row = crearResponse();
                $row['errors'] = ['email' => 'El correo electrónico no se encuentra en nuestros registros.'];
            }else{
               $db_password = $exite->password;
               if (password_verify($this->VALID_DATA['password'], $db_password)){
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

            }

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

}