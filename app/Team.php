<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function projects(){
    return $this->hasMany('App\Project');
  }

  public function contests()
  {
      return $this->belongsToMany('App\Contest');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
