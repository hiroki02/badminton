<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];
    
    public function rackets()
    {
      return $this->belongsTo('App\Racket');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
