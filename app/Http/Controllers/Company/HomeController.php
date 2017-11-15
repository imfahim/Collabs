<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Team;
use App\Project;
use App\Contest;

class HomeController extends Controller
{
  public function index()
  {
    $users_count = $this->get_total_users();
    $teams_count = $this->get_total_teams();
    $projects_count = $this->get_total_projects();
    $contests_count = $this->get_total_contests();

    return view('company.home')
    ->with('users_count', $users_count)
    ->with('teams_count', $teams_count)
    ->with('projects_count', $projects_count)
    ->with('contests_count', $contests_count);
  }

  private function get_total_users(){
    $users = User::all(['email']);

    if($users){
      return count($users);
    }
    return 0;
  }

  private function get_total_teams(){
    $teams = Team::all(['name']);

    if($teams){
      return count($teams);
    }
    return 0;
  }

  private function get_total_projects(){
    $projects = Project::all(['name']);

    if($projects){
      return count($projects);
    }
    return 0;
  }

  private function get_total_contests(){
    $contests = Contest::all(['title']);

    if($contests){
      return count($contests);
    }
    return 0;
  }

  public function get_chart_data(){
    $data = Team::all(['total_member', 'existing_member']);

    foreach ($data as $single) {

    }

    dd($data);
  }
}
