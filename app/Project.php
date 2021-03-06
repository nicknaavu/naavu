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

  public function comments()
    {
      return $this->morphMany('App\Comment','commentable');
    }

  public function project_skills()
    {
      return $this->hasMany('App\Project_skill');
    }

  public function posts()
    {
        return $this->hasMany('App\Post');
    }

  public function likes()
    {
      return $this->morphMany('App\Like','likable');
    }

  public function follows()
    {
      return $this->morphMany('App\Follow','followable');
    }
    
  public function reviews()
    {
      return $this->hasMany('App\Review');
    }
}
