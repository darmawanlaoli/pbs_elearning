<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindergartenStudent extends Model
{

    protected $fillable = [
        'name',
        'class',
        'registration_number',
        'grade',
        'gender',
        'dob',
        'first_day_of_school',
        'name_of_parents',
        'teachers',
        'address',
        'created_at',
        'updated_at',
    ];

}
