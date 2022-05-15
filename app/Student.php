<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    protected $connection = 'mysql2';

    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    public $with = [ 'level'];

}
