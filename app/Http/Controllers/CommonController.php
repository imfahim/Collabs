<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Team;
use App\Contest;

use Session;

class CommonController extends Controller
{
    public function browse_users(){
      $all_users = User::all(['id', 'name', 'email', 'type'])->take(8);

      if(Session::has('success') && Session::get('success') === 'Successfully Found !'){
        if(Session::has('users')){

          $searched_users = Session::get('users');
          return view('common.users')->with('users', $all_users)->with('searched_users', $searched_users);
        }else{
          $searched_users = '';
          return view('common.users')->with('users', $all_users)->with('searched_users', $searched_users);
        }
      }else{
        $searched_users = '';
        return view('common.users')->with('users', $all_users)->with('searched_users', $searched_users);
      }
    }

    public function browse_teams(){
      $all_teams = Team::where('status', 0)->take(8)->get(['id', 'name', 'total_member', 'existing_member']);

      if(Session::has('success') && Session::get('success') === 'Successfully Found !'){
        if(Session::has('teams')){

          $searched_teams = Session::get('teams');
          return view('common.teams')->with('teams', $all_teams)->with('searched_teams', $searched_teams);
        }else{
          $searched_teams = '';
          return view('common.teams')->with('teams', $all_teams)->with('searched_teams', $searched_teams);
        }
      }else{
        $searched_teams = '';
        return view('common.teams')->with('teams', $all_teams)->with('searched_teams', $searched_teams);
      }
    }

    public function browse_contests(){
      $all_contests = Contest::where('status', 0)->take(8)->get(['id', 'title', 'start_on', 'close_on']);

      if(Session::has('success') && Session::get('success') === 'Successfully Found !'){
        if(Session::has('contests')){

          $searched_contests = Session::get('contests');
          return view('common.contests')->with('contests', $all_contests)->with('searched_contests', $searched_contests);
        }else{
          $searched_contests = '';
          return view('common.contests')->with('contests', $all_contests)->with('searched_contests', $searched_contests);
        }
      }else{
        $searched_contests = '';
        return view('common.contests')->with('contests', $all_contests)->with('searched_contests', $searched_contests);
      }
    }

    public function search_users(Request $request){
      $users = User::where('name', 'LIKE', '%'.$request->name.'%')->orwhere('email', 'LIKE', '%'.$request->name.'%')->get(['id', 'name', 'email', 'type']);

      if($users){
        Session::put('users', $users);
        Session::flash('success', 'Successfully Found !');
        return redirect()->back();
      }
      Session::flash('fail', 'Could not Found !');
      return redirect()->back();
    }

    public function search_teams(Request $request){
      $teams = Team::where('status', 0)->where('name', 'LIKE', '%'.$request->name.'%')->get(['id', 'name', 'total_member', 'existing_member']);

      if($teams){
        Session::put('teams', $teams);
        Session::flash('success', 'Successfully Found !');
        return redirect()->back();
      }
      Session::flash('fail', 'Could not Found !');
      return redirect()->back();
    }

    public function search_contests(Request $request){
      $contests = Contest::where('status', 0)->where('title', 'LIKE', '%'.$request->name.'%')->get(['id', 'title', 'start_on', 'close_on']);

      if($contests){
        Session::put('contests', $contests);
        Session::flash('success', 'Successfully Found !');
        return redirect()->back();
      }
      Session::flash('fail', 'Could not Found !');
      return redirect()->back();
    }
}
