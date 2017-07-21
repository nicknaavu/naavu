<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
      'subject',
      'body',
      'reviewer_id',
      'reviewee_id'
    ];

  public function reviewer()
    {
    return $this->belongsTo('App\User','reviewer_id');
    }

  public function reviewee()
    {
    return $this->belongsTo('App\User','reviewee_id');
    }

  public function project()
    {
      return $this->belongsTo('App\Project');
    }

  public function notifications()
    {
      return $this->morphMany('App\Notification','notifiable');
    }
}
