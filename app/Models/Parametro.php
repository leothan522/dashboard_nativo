<?php

namespace app\Models;

class Parametro extends Model
{
    protected string $table = "parametros";
    protected array $fillable = [
        'nombre',
        'tabla_id',
        'valor',
        'rowquid',
        'created_at'
    ];
}