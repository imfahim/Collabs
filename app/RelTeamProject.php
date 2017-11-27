<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelTeamProject extends Model
{
  protected $table = 'team_project';
  protected $primaryKey = 'team_project_id';
  public $timestamps = false;
}
