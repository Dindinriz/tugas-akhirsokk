<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'code', 'name', 'gender', 'birth_place', 'birth_date',
    ];
}
