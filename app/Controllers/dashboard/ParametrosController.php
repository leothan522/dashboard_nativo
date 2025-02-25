<?php

namespace app\Controllers\dashboard;

use app\Controllers\Controller;
use app\Middlewares\Middleware;
use app\Models\Parametro;
use app\Providers\Rule;
use app\Traits\CardView;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer;

class ParametrosController extends Controller
{
    use CardView;

    public function __construct()
    {
        $closure = 'web';
        if ($_POST){
            $closure = [];
        }
        Middleware::admin($closure);
        $this->setTitle('Parametros');
    }

    public function index()
    {
        try {
            $data = $this->initData();
            return $this->view('dashboard.parametros.view', $data);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function show()
    {
        try {
            return $this->initShow();
        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function save()
    {
        try {

            $rules = [
                //"nombre" => "required|alpha_numeric_dash",
                "nombre" => ['required', 'alpha_numeric_dash', 'unique' => Rule::unique('parametros', 'nombre')],
                "tabla_id" => "required|integer",
                "valor" => "required"
            ];

            $messages = [
                "nombre" => ["alpha_numeric_dash" => "alpha_numeric_dash"]
            ];

            $filter = [
                "nombre" => "trim|sanitize_string|lower_case",
                "valor" => "trim|sanitize_string"
            ];

            $this->validate($rules, $messages, $filter);

            $model = new Parametro();
            $data = array_values($this->VALID_DATA);
            $data[] = getRowquid($model);
            $row = $model->save($data);
            $this->setActualRowquid($row->rowquid);
            $row->actualRowquid = $this->getActualRowquid();
            $row->ok = true;

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function update()
    {
        try {

            $id = 0;
            $rowquid = $_POST['rowquid'] ?? 'NULL';
            $model = new Parametro();
            $existe = $model->where('rowquid', $rowquid)->first();
            if ($existe){
                $id = $existe->id;
            }

            $rules = [
                //"nombre" => "required|alpha_numeric_dash",
                "nombre" => ['required', 'alpha_numeric_dash', 'unique' => Rule::unique('parametros', 'nombre', $id)],
                "tabla_id" => "required|integer",
                "valor" => "required"
            ];

            $messages = [
                "nombre" => ["alpha_numeric_dash" => "alpha_numeric_dash"]
            ];

            $filter = [
                "nombre" => "trim|sanitize_string|lower_case",
                "valor" => "trim|sanitize_string"
            ];

            $this->validate($rules, $messages, $filter);

            $data   = $this->VALID_DATA;
            unset($data['rowquid']);

            if ($existe){
                $row = $model->update($existe->id, $data);
                $row->ok = true;
            }else{
                $row = crearResponse('Token de seguridad vencido por favor actualice.', null);
            }

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }

    }

    public function destroy()
    {
        try {

            $rowquid = $_POST['rowquid'];
            $model = new Parametro();
            $parametro = $model->where('rowquid', $rowquid)->first();
            if ($parametro){
                $data = [
                    'nombre' => "*".$parametro->nombre,
                ];
                $model->update($parametro->id, $data);
                $model->delete($parametro->id);
                $data['ok'] = true;
            }else{
                $data['ok'] = false;
                $data['noToast'] = true;
            }
            if ($this->lastRegistro()){
                $ultimo = $this->lastRegistro();
                $data['lastRegistro'] = true;
                $data['rowquid'] = $ultimo->rowquid;
            }else{
                $data['lastRegistro'] = false;
            }

            return $this->json($data);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function search()
    {
        try {
            $keyword = $_POST['keyword'] ?? '';
            $data = $this->initData(null, 0, false, $keyword);
            $data['keyword'] = $keyword;
            return $this->view('dashboard.parametros.table', $data);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function export()
    {
//        $spreadsheet = new Spreadsheet();           // create excel instance
//        $sheet = $spreadsheet->getActiveSheet();    // get sheet instance
//        $sheet->setTitle('Demo');                   // set sheet title
//
//        // populate data
//        $sheet->setCellValue('A1', 'Nombres:');
//        $sheet->setCellValue('B1', 'Luis Armstrong');
//
//        $sheet->setCellValue('A2', 'Email:');
//        $sheet->setCellValue('B2', 'louis@gmail.com');
//
//        // write file
//        $writer = new Xlsx($spreadsheet);
        //$writer->save('storage/tmp/hello.xlsx');
    }
    protected function refreshTable($refresh = false): false|string|null
    {
        $limit = $_POST['limit'] ?? 0;
        $data = $this->initData(null, $limit, $refresh);
        return $this->view('dashboard.parametros.table', $data);
    }

}