<?php

namespace app\Controllers\web;

use app\Controllers\Controller;
use app\Middlewares\Middleware;
use app\Models\User;
use app\Providers\Auth;
use app\Providers\Rule;

class ProfileController extends Controller
{

    public function __construct()
    {
        Middleware::auth('login');
    }

    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return $this->view('web.profile.view', $data);
    }

    public function editProfile(){
        try {
            $model = new User();
            $row = [];
            $id = 0;
            $rowquid = $_POST['rowquid'] ?? 'NULL';
            $cambios = false;
            $existe = $model->where('rowquid', $rowquid)->first();
            if ($existe){
                $id = $existe->id;
            }

            $rules = [
                'password'    => 'required|max_len,50|min_len,8',
                'name'    => 'required|valid_name|max_len,50|min_len,3',
                'email'       => ['required', 'valid_email', 'unique' => Rule::unique('users', 'email', $id)],
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

            $db_name = $existe->name;
            $db_email = $existe->email;
            $db_password = $existe->password;

            if (password_verify($this->VALID_DATA['password'], $db_password)){

                if ($db_name !== $this->VALID_DATA['name']){
                    $cambios = true;
                    $data = [
                        'name' => $this->VALID_DATA['name']
                    ];
                    $model->update($id, $data);
                }

                if ($db_email !== $this->VALID_DATA['email']){
                    $cambios = true;
                    $data = [
                        'email' => $this->VALID_DATA['email']
                    ];
                    $model->update($id, $data);
                }

                if ($cambios){
                    $user = $model->find($existe->id);
                    $row = crearResponse(
                        'Datos Actualizados Correctamente.',
                        'Datos Actualizados',
                        true,
                        'success'
                    );
                    $row['name'] = $user->name;
                    $row['email'] = $user->email;
                }else{
                    $row = crearResponse(
                        'No se realizó ningún cambio.',
                        'Sin cambios',
                        false,
                        'info'
                    );
                }

            }else{
                $row = crearResponse();
                $row['errors'] = ['password' => 'La contraseña es incorrecta.'];
            }

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

}