<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable = [
        'sender',
        'message',
        'class',
        'created_at',
        'updated_at',
    ];

}
