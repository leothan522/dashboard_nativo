<?php

namespace app\Controllers;
use app\Models\User;
use lib\Facades\GUMP;

class AuthController extends Controller
{
    public function register()
    {
        try {

            $model = new User();
            $row = [];

            $gump = new GUMP();

            $gump->validation_rules([
                'name'    => 'required|valid_name|max_len,50|min_len,3',
                'email'       => 'required|valid_email',
                'password'    => 'required|max_len,50|min_len,8',
            ]);

            $gump->set_fields_error_messages([
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

            ]);

            $gump->filter_rules([
                'name' => 'trim',
                'email' => 'sanitize_email'
            ]);

            $valid_data = $gump->run($_POST);

            $exite = $model->where('email', $valid_data['email'])->first();


            if ($gump->errors() || $exite){
                //mando mesajes de error
                $row = crearResponse();
                if ($gump->errors()){
                    $row['errors'] = $gump->get_errors_array();
                }else{
                    $row['errors'] = ['email' => 'El correo electrónico ya se encuentra registrado.'];
                }


            }else{
                //guardo en la database
                $data = array_values($valid_data);
                $data[] = getRowquid($model);
                $row = $model->save($data);
                $row->ok = true;
            }


            return $this->json($row);


        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }
}