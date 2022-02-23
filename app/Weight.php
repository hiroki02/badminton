<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public function racket()   
    {
        // ラケットのモデルと重さのモデルが1対多の関係を築いている
        return $this->hasMany('App\Racket');  
    }
}
