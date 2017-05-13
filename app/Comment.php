<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
      'body',
      'commenter_id',
      'commentable_type',
      'commentable_id'
    ];

    public function commenter()
      {
        return $this->belongsTo('App\User','commenter_id');
      }

    public function commentable()
    {
      return $this->morphTo();
    }

  public function likes()
    {
      return $this->morphMany('App\Like','likable');
    }
}
