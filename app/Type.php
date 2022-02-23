<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function racket()   
    {
        // ラケットのモデルとタイプのモデルが1対多の関係を築いている
        return $this->hasMany('App\Racket');  
    }
}
