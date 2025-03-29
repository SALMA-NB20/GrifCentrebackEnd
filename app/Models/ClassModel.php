<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = [
        'professor_id',
        'name',
        'code',
        'description',
        'schedule'
    ];

    // Relationship with professor
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    // Relationship with students
    public function students()
    {
        return $this->belongsToMany(User::class, 'class_student', 'class_id', 'student_id')
            ->withTimestamps();
    }

    // Relationship with subjects
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }

    // Relationship with attendances
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_id');
    }
}