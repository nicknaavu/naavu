<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title','body','user_id','project_id'
    ];

  public function user()
    {
      return $this->belongsTo('App/User');
    }

  public function project()
    {
      return $this->belongsTo('App/Project');
    }


}
