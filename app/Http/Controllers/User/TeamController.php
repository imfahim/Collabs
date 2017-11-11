<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TeamRequest;
use Session;


class TeamController extends Controller
{
    //
    public function index()
    {


      $joind_teams =DB::table('team_user')
              ->join('teams', 'teams.id', '=', 'team_user.team_id')
            ->where('team_user.user_id', '=', session('id'))
            ->where('team_user.invite','=',1)
            ->paginate(3);
      $rqsts=DB::table('team_user')
                ->where('user_id',session('id'))
                ->where('invite',0)
                ->get();
      $my_team=DB::table('teams')
                  ->where('leader_id',session('id'))
                  ->paginate(3);

      return view('user.team.index')->withMyteam($my_team)
                                    ->withJoindteam($joind_teams)
                                    ->withRqsts(count($rqsts));
    }

    public function create()
    {
      return view('user.team.create');
    }
    public function reqaccept($id)
    {
      DB::table('team_user')
      ->where('user_id', session('id'))
      ->where('team_id', $id)
      ->update(['invite' => 1]);

      Session::flash('success', 'Team Joined!');
      return redirect()->route('team');
    }
    public function reqdecline($id)
    {
      DB::table('team_user')
      ->where('user_id', session('id'))
      ->where('team_id', $id)
      ->delete();

      Session::flash('success', 'Declined!');

      return redirect()->route('team');
    }

    public function requests()
    {
      $rqsts=DB::table('team_user')
                ->join('teams', 'teams.id', '=', 'team_user.team_id')
                ->where('team_user.user_id',session('id'))
                ->where('team_user.invite',0)
                ->paginate(3);
      return view('user.team.requests')->withTeams($rqsts);
    }

    public function edit($id)
    {
      $team= DB:: table('teams')
              ->where('id',$id)
              ->first();

      return view('user.team.edit')->withTeam($team);
    }

    public function searchuser($id)
    {
      return view('user.team.searchuser')->withTeamid($id);
    }


    public function invite($teamid,$userid)
    {
      $us = DB::table('team_user')
                ->where('team_id',$teamid)
                  ->where('user_id',$userid)
                  ->first();

      if($us){
        if($us->invite==0){
          //reqst sent
          Session::flash('fail', 'Request already Sent!' );
        }
        else{
          //already a member
          Session::flash('success', 'Already a member!' );
        }
      }
      else{
      DB::table('team_user')->insert(
          ['user_id'=>$userid,'team_id'=>$teamid]
      );
      Session::flash('success', 'Request Sent!');
      }
      return redirect()->route('team.details',[$teamid]);

    }

    public function searchresult(Request $request)
    {
      $this->validate($request,[
        'search' => 'required',
        ]);

      $users = DB::Table('users')
                ->select('*')
                ->where('name','LIKE','%'.$request->input('search').'%')
                ->orWhere('email','LIKE','%'.$request->input('search').'%')
                ->get();

      return view('user.team.searchresult')->withUsers($users)
                                          ->withTeamid($request->input('team_id'));
    }

    public function details($id)
    {
      $leader=DB::table('teams')
                  ->join('users','users.id','=','teams.leader_id')
                  ->where('teams.id',$id)
                  ->first();

      $members=DB::table('team_user')
              ->join('users', 'users.id', '=', 'team_user.user_id')
            ->where('team_user.team_id', '=', $id)
            ->get();


      return view('user.team.details')->withLeader($leader)
                                      ->withMembers($members)
                                      ->withTeamid($id);
    }

    public function update(Request $request)
    {

      $this->validate($request,[
        'team_name' => 'required|unique:teams,name,'.$request->input('id'),
        'leader_id'=>'required',
        ]);

        $updateDetails=array(
                'name' => $request->input('team_name'),
                'total_member' => $request->input('total_member'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
                'updated_at' => date('Y/m/d h:i:s',time())
            );

      DB::table('teams')
            ->where('id', $request->input('id'))
            ->update($updateDetails);

      $request->session()->flash('success', 'Team Successfully Edited');
      return redirect()->route('team');
    }

    public function store(TeamRequest $request)
    {

        $team_id =DB::table('teams')->insertGetId(
                ['name' => $request->input('team_name'),'total_member' => $request->input('total_member'), 'leader_id' => $request->input('leader_id'),'leader_name' => $request->session()->get('username'), 'description' => $request->input('description')]
        );


        $request->session()->flash('success', 'Team Create Successful');


        return redirect()->route('team');
    }
}
