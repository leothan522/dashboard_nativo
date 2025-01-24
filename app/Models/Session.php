<?php

namespace app\Models;

class Session extends Model
{
    protected string $table = 'sessions';
    protected array $fillable = [
        'users_id',
        'ip_address',
        'user_agent',
        'user_client',
        'user_os',
        'rowquid',
    ];
}