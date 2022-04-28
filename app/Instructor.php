<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    

    protected $guarded = [];


    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

// ->withPivot(['course_name' , 'instructor_name'])
