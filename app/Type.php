<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Racket');  
    }
}
