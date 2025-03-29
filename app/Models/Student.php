<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'phone', 'cin', 'date_inscription', 
        'email', 'password', 'classe_id'
    ];

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
