<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
      'type','sender_id','recipient_id','notifiable_id','notifiable_type'
    ];

    public function notifiable()
    {
      return $this->morphTo();
    }

    public function sender()
      {
        return $this->belongsTo('App\User','sender_id');
      }

    public function recipient()
      {
        return $this->belongsTo('App\User','recipient_id');
      }
}
