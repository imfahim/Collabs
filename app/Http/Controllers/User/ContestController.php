<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contest;
use App\Team;
use App\Project;
use App\RelContestUser;
use Session;

class ContestController extends Controller
{
    public function index(){
      $contests = Contest::all();
      $teams = Team::where('leader_id', Session::get('id'))->get(['id', 'name']);

      $participations = RelContestUser::where('user_id', Session::get('id'))->get(['id', 'contest_id', 'team_id', 'project_id', 'status']);

      $data_array = array();
      $data_has = false;

      if(!$participations->isEmpty()){
        $data_has = true;

        foreach ($participations as $participation) {
          $data_array[] = [
            'id' => $participation->id,
            'contest_name' => Contest::where('id', $participation->contest_id)->first()['title'],
            'team_name' => Team::where('id', $participation->team_id)->first()['name'],
            'project_name' => Project::where('id', $participation->project_id)->first()['name'],
            'status' => $participation->status,
          ];
        }
      }

      Session::put('menu', 'contest');
      return view('user.contests.index')->with('contests', $contests)->with('teams', $teams)->with('joined_contests', $data_array)->with('has_data', $data_has);
    }

    public function join(Request $request){
      $check = RelContestUser::where('contest_id', $request->id)->where('team_id', $request->team)->exists();

      if(!$check){
        $projects = Project::where('team_id', $request->team)->get(['id', 'name']);

        return view('user.contests.join')->with('projects', $projects)->with('contest_id', $request->id)->with('team_id', $request->team);
      }

      Session::flash('fail', 'Your have already submitted for the Contest !');
      return redirect()->route('user.contests.index');
    }

    public function participate(Request $request){

      $this->validate($request, [
        'about' => 'nullable|max:500'
        ]);

      $contest_user = new RelContestUser;

      $contest_user->user_id = Session::get('id');
      $contest_user->contest_id = $request->contest_id;
      $contest_user->team_id = $request->team_id;
      $contest_user->project_id = $request->project_id;
      $contest_user->about = $request->about;

      $contest_user->save();

      Session::flash('success', 'Your Participation From is Successfully Submitted !');
      return redirect()->route('user.contests.index');
    }

    public function cancel(Request $request){
      RelContestUser::destroy($request->id);

      Session::flash('success', 'Your Participation is Successfully Cancelled !');
      return redirect()->route('user.contests.index');
    }
}
