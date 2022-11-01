<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Profile extends Model
{
    use HasFactory;
    protected $table = 'student_profile';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'student_id',
        'student_education',
        'student_profile',
        'student_resume',
        'student_aboutMe',
        'student_status',
    ];
}
