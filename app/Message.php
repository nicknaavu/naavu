<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'body','thread_id','user_id'
    ];

    public function thread()
      {
        return $this->belongsTo('App\Thread');
      }

    public function user()
      {
        return $this->belongsTo('App\User');
      }
}
