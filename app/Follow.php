<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  protected $fillable = [
    'follower_id','followable_id','followable_type'
  ];

  public function follower()
    {
      return $this->belongsTo('App\User','follower_id');
    }

  public function followable()
    {
      return $this->morphTo();
    }
}
