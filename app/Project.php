<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
    'project',
    'description'
  ];

  public function users()
    {
      return $this->belongsToMany('App\User')->withTimestamps()->withPivot('status');
    }

  public function notifications()
    {
      return $this->morphMany('App\Notification','notifiable');
    }
}
