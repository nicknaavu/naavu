<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
  protected $fillable = [
      'skill', 'description', 'user_id'
  ];

  public function user()
    {
      return $this->belongsTo('App\User');
    }
}
