<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grip extends Model
{
    public function rackets()   
    {
        return $this->hasMany('App\Racket');  
    }
}