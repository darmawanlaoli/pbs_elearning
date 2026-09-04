<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindergartenAssesmentRecordDetail  extends Model
{

    protected $fillable = [
        'id_assesment',
        'name',
        'introduce_name',
        'greet_teacher',
        'answer_question',
        'ask_question',
        'created_at',
        'updated_at',
    ];

}
