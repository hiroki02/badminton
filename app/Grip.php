<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grip extends Model
{
    public function racket()   
    {
        // ラケットモデルとグリップモデルが1対多の関係を築いている
        return $this->hasMany('App\Racket');  
    }
}