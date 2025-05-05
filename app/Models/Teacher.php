<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function students()
{
    return $this->hasMany(Student::class, 'class_teacher_id');
}
}
