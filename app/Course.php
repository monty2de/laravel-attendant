<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $guarded = [];



    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }


    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
