<?php

namespace app\Providers;

use app\Models\Model;

class Rule
{
    public static function unique(string $table, string $column, int $ignoreID = 0, string $valueName = null): bool
    {
        $valor = '';
        if (!empty($valueName)) {
            if ($_POST[$valueName]) {
                $valor = $_POST[$valueName];
            }
        } else {
            if ($_POST[$column]) {
                $valor = $_POST[$column];
            }
        }

        $model = new Model();

        if ($ignoreID != 0) {
            $sql = "SELECT * FROM $table WHERE $column = '$valor' AND id != $ignoreID";
        } else {
            $sql = "SELECT * FROM $table WHERE $column = '$valor'";
        }

        $existe = $model->query($sql)->first();

        if ($existe) {
            return true;
        } else {
            return false;
        }
    }
}