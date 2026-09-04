<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindergartenAssesmentRecord extends Model
{

    protected $fillable = [
        'class',
        'homeroom',
        'academic_year',
        'term',
        'distribution_date',
        'created_at',
        'updated_at',
    ];

}
