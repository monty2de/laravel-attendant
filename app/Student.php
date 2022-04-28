<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];



    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    public $with = [ 'level'];

}
