<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id', 'name', 'email', 'date_of_birth',
        'gender', 'address', 'phone'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
