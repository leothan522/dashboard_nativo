<?php

namespace app\Traits;

use app\Models\Parametro;

trait CardView
{
    public string $title = "Dashboard";
    public int $limitRows = 0;
    public bool $btnDisabled = true;

    public function limit()
    {
        try {
            return $this->refreshTable();
        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function refresh()
    {
        try {
            return $this->refreshTable(true);
        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    protected function setTitle($title): void
    {
        $this->title = $title;
    }

    protected function initData($model = null, $limit = 0, $refresh = false, $keyword = '', $sql = null): array
    {
        if ($refresh){
            $this->limitRows = $limit;
        }else{
            $this->setLimit($limit);
        }
        if (empty($model)){
            $model = new Parametro();
        }
        $totalRows = $model->where('id', '!=', 0)->count();

        if (empty($keyword)){
            $parametros = $model->limit($this->limitRows)->orderBy('created_at', 'DESC')->all();
            $limitRows = $model->limit($this->limitRows)->count();
        }else{
            if (empty($sql)){
                $sql = "SELECT * FROM `parametros` WHERE deleted_at IS NULL AND `nombre` LIKE '%$keyword%' OR `id` LIKE '%$keyword%' ORDER BY `created_at` DESC LIMIT 100;";
            }
            $parametros = $model->query($sql)->get();
            $limitRows = $model->query($sql)->count();
        }

        $this->btnVerMas($limitRows, $totalRows);

        if ($totalRows > 0){
            $ocultarShow= false;
            $ocultarForm = true;

            $row = $this->lastRegistro();
            $lastRegistro = $row;
            if (!$refresh){
                $this->setActualRowquid($row->rowquid);
            }
            $actualRowquid = $this->getActualRowquid();
        }else{
            $ocultarShow = true;
            $ocultarForm = false;
            $lastRegistro = null;
            $actualRowquid = null;
        }

        return [
            "totalRows" => $totalRows,
            "limitRows" => $limitRows,
            "limit" => $this->limitRows,
            "btnDisabled" => $this->btnDisabled,
            "listarRegistros" => $parametros,
            "ocultarShow" => $ocultarShow,
            "ocultarForm" => $ocultarForm,
            "lastRegistro" => $lastRegistro,
            "actualRowquid" => $actualRowquid,
        ];
    }

    protected function lastRegistro($model = null): mixed
    {
        $response = null;
        if (empty($model)){
            $model = new Parametro();
        }
        $parametro = $model->orderBy('created_at', 'DESC')->where('id', '!=', 0)->first();
        if ($parametro){
            $response = $parametro;
        }
        return $response;
    }

    protected function initShow($model = null): false|string
    {
        $rowquid = $_POST['rowquid'];
        if (empty($model)){
            $model = new Parametro();
        }
        $parametro = $model->where('rowquid', $rowquid)->first();
        if ($parametro){
            $parametro->ok = true;
            $parametro->noToast = true;
            $data = $parametro;
            $this->setActualRowquid($parametro->rowquid);
            $data->actualRowquid = $this->getActualRowquid();
        }else{
            $data['ok'] = false;
            $data['noToast'] = true;
            $data['actualRowquid'] = null;
        }
        return $this->json($data);
    }

    protected function setLimit($limit = 0, array $limits = []): void
    {
        if (empty($limits)){
            if ($limit){
                $this->limitRows = $limit + $this->numRowsPaginate();
            }else{
                $this->limitRows = $this->limitRows + $this->numRowsPaginate();
            }
        }else{
            foreach ($limits as $key){

                if ($limit){
                    $this->$key = $limit + $this->numRowsPaginate();
                }else{
                    $this->$key = $this->$key + $this->numRowsPaginate();
                }
            }
        }
    }

    protected function btnVerMas($limitRows, $totalRows, array $buttons = []): void
    {
        if ($totalRows > $limitRows) {
            if (empty($buttons)){
                $this->btnDisabled = false;
            }else{
                foreach ($buttons as $button){
                    $this->$button = false;
                }
            }

        }else{
            if (empty($buttons)){
                $this->btnDisabled = true;
            }else{
                foreach ($buttons as $button){
                    $this->$button = true;
                }
            }
        }
    }

    protected function numRowsPaginate(): int
    {
        $num = 15;
        $model = new Parametro();
        $parametro = $model->where('nombre', "numRowsPaginate")->first();
        if ($parametro){
            if (intval($parametro->valor)){
                $num = intval($parametro->valor);
            }
        }
        return $num;
    }

    protected function setActualRowquid(string $actualRowquid): void
    {
        $_SESSION[APP_KEY.'rowquid'] = $actualRowquid;
    }

    protected function getActualRowquid(): string
    {
        return $_SESSION[APP_KEY . 'rowquid'] ?? '';
    }

}