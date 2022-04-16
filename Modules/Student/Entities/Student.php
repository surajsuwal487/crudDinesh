<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [

        'fullname',
        'address',
        'phone_number',
        'student_image',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Student\Database\factories\StudentFactory::new();
    }
}
