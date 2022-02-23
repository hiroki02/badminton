<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_id',
        'racket_id'
        ];
    
    public function racket()
    {
    //コメントのモデルとラケットのモデルが1対多(Inverse)の関係を築いている
      return $this->belongsTo('App\Racket');
    }
    public function user()
    {
        //コメントのモデルとユーザーのモデルが1対多（Inverse）の関係を築いている
        return $this->belongsTo('App\User');
    }
}
