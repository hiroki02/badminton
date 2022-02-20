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
    
    public function rackets()
    {
      return $this->belongsTo('App\Racket');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
