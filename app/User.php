<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
      {
        return $this->hasMany('App\Skill');
      }

    public function interests()
      {
        return $this->hasMany('App\Interest');
      }

    public function recipient_notifications()
      {
        return $this->hasMany('App\Notification','recipient_id');
      }

    public function sender_notifications()
      {
        return $this->hasMany('App\Notification','sender_id');
      }


    public function threads()
      {
        return $this->belongsToMany('App\Thread')->withTimestamps();
      }

    public function projects()
      {
        return $this->belongsToMany('App\Project')->withTimestamps()->withPivot('status');
      }

    public function messages()
      {
          return $this->hasMany('App\Message');
      }

    public function likes()
      {
          return $this->hasMany('App\Like');
      }

    public function follows()
      {
        return $this->morphMany('App\Follow','followable');
      }

    public function posts()
      {
          return $this->hasMany('App\Post');
      }

    public function comments()
      {
          return $this->hasMany('App\Comment');
      }
}
