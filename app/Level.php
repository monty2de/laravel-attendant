<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    

    protected $guarded = [];




    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
