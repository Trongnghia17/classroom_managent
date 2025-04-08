<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Classroom.php
class Classroom extends Model
{
    protected $fillable = ['name', 'grade_level', 'capacity', 'description'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
