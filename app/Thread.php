<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
      'subject'
    ];

    public function users()
      {
        return $this->belongsToMany('App\User')->withTimestamps();
      }

    public function messages()
      {
        return $this->hasMany('App\Message');
      }
}
