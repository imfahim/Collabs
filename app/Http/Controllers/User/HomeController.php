<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\User;
use App\Team;
use App\Project;
use App\Contest;
use App\RelContestUser;

class HomeController extends Controller
{

    public function index()
    {
      $users_count = $this->get_total_users();
      $teams_count = $this->get_total_teams();
      $projects_count = $this->get_total_projects();
      $contests_count = $this->get_total_contests();

      $winners = $this->get_winners();

      Session::put('menu', 'home');
      return view('user.home')
        ->with('users_count', $users_count)
        ->with('teams_count', $teams_count)
        ->with('projects_count', $projects_count)
        ->with('contests_count', $contests_count)
        ->with('winners', $winners);
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

    public function get_winners(){
      $winning_participations = RelContestUser::where('status', 1)->get(['contest_id', 'team_id']);

      $winning_array = array();

      if(!$winning_participations->isEmpty()){
        foreach ($winning_participations as $winners) {
          $winning_array[] = [
            'contest_name' => Contest::where('id', $winners->contest_id)->first()['title'],
            'team_name' => Team::where('id', $winners->team_id)->first()['name'],
          ];
        }

        return $winning_array;
      }

      return null;
    }
}
