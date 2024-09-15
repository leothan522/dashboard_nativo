<?php

namespace app\Models;

class Parametro extends Model
{
    protected bool $softDelete = true;
    protected string $table = "parametros";
    protected array $fillable = [
        'nombre',
        'tabla_id',
        'valor',
        'rowquid',
    ];
}