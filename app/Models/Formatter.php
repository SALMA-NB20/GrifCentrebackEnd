<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formatter extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'phone',
        'cin',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}
