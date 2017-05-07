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

  public function reps()
    {
      return $this->belongsToMany('App\User')->wherePivot('status',1);
    }

  public function notifications()
    {
      return $this->morphMany('App\Notification','notifiable');
    }

  public function project_skills()
    {
      return $this->hasMany('App\Project_skill');
    }

  public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
