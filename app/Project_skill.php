<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_skill extends Model
{
    protected $fillable = [
      'skill',
      'description',
      'level',
      'status',
      'project_id'
    ];

    public function project()
      {
        return $this->belongsTo('App\Project');
      }
}
