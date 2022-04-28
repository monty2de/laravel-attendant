<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    

    protected $guarded = [];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
