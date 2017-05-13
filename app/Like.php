<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'liker_id','likable_id','likable_type'
  ];

  public function liker()
    {
      return $this->belongsTo('App\User','liker_id');
    }

  public function likable()
    {
      return $this->morphTo();
    }
}
