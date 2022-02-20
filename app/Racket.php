<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racket extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'type_id',
        'weight_id',
        'grip_id',
        'maker',
        'body',
    ];
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function Type()   
    {
        return $this->belongsTo('App\Type');  
    }
    public function Weight()   
    {
        return $this->belongsTo('App\Weight');  
    }
    public function Grip()   
    {
        return $this->belongsTo('App\Grip');  
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
