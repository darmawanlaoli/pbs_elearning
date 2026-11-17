<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HwWsSchedule extends Model
{

    protected $fillable = [
        'id_teacher',
        'tanggal',
        'kind_of_assessment',
        'academic_year',
        'term',
        'subject',
        'class',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
