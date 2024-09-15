
# Validar formularios con GUMP

Ejemplo Usando el Model Parametro

            $model = new Parametro();

            $gump = new GUMP();

            // establecer reglas de validación
            $gump->validation_rules([
                'nombre' => 'required|min_len, 3|max_len,50',
                'tabla_id' => 'required|integer',
                'valor' => 'required'
            ]);

            // establecer reglas de filtro
            $gump->filter_rules([
                'nombre' => 'trim|rmpunctuation|sanitize_string',
                'tabla_id' => 'trim|whole_number',
                'valor'    => 'trim',
            ]);

            // establecer mensajes de error específicos de las reglas de campo
            $gump->set_fields_error_messages([
                //
            ]);

            // establecer reglas de filtro
            $gump->filter_rules([
                'nombre' => 'trim|rmpunctuation|sanitize_string',
                'valor'    => 'trim',
            ]);

            // en caso de éxito: devuelve una matriz con la misma estructura de entrada,
            // pero después de que se hayan ejecutado los filtros
            // en caso de error: devuelve falso
            $valid_data = $gump->run($_POST);

            if ($gump->errors()){
                $row = crearResponse('Faltan Datos', 'revisar');
                $row['errors'] = $gump->get_errors_array();
            }else{
                $data = array_values($valid_data);
                $data[] = getRowquid($model);
                $row = $model->save($data);
            }

            return $this->json($row);