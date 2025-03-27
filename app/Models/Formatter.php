<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formatter extends Model
{
    protected $fillable = [
        'cin',
        'nom',
        'prenom',
        'phone',
        'email',
        'password',
        'address',
        'speciality'
    ];
}
