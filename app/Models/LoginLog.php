<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = [
        'username',
        'name',
        'role',
        'ip_address',
        'user_agent',
        'login_at',
    ];
}

?>
