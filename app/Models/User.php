<?php

namespace app\Models;

use app\Models\Model;

class User extends Model
{
    protected bool $softDelete = true;
    protected string $table = 'users';
    protected array $fillable = [
        'name',
        'email',
        'password',
        'rowquid',
    ];
}