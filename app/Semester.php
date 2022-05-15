<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    

    protected $guarded = [];

    protected $connection = 'mysql2';
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
