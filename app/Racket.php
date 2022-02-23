<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racket extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'user_id',
        'type_id',
        'weight_id',
        'grip_id',
        'maker',
        'body',
    ];
    public function Type()   
    {
        // ラケットのモデルとタイプのモデルが1対多(Inverse)の関係を築いている
        return $this->belongsTo('App\Type');  
    }
    public function Weight()   
    {
        // ラケットのモデルと重さのモデルが1対多(Inverse)の関係を築いている
        return $this->belongsTo('App\Weight');  
    }
    public function Grip()   
    {        
        // ラケットのモデルとグリップのモデルが1対多(Inverse)の関係を築いている
        return $this->belongsTo('App\Grip');  
    }
    public function comments()
    {
        // ラケットのモデルとコメントのモデルが1対多の関係を築いている
      return $this->hasMany('App\Comment');
    }
    public function user()
    {
        // ラケットのモデルとユーザーのモデルが1対多(Inverse)の関係を築いている
        return $this->belongsTo('App\User');
    }
}
