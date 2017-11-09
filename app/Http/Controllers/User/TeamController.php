<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TeamRequest;


class TeamController extends Controller
{
    //
    public function index()
    {


      $teams =DB::table('team_user')
              ->join('teams', 'teams.id', '=', 'team_user.team_id')
            ->where('team_user.user_id', '=', session('id'))
            ->paginate(3);


      /*$teams = DB::table('team_user')->where('user_id', session('id'))
                                     ->get();
      $team_id=array();
      $i=0;
      foreach ($teams as $key => $value) {
        # code...
        array_push($team_id,$key);
      }*/


      return view('user.team.index')->withJins($teams);
    }

    public function create()
    {
      return view('user.team.create');
    }

    public function edit($id)
    {
      $team= DB:: table('teams')
              ->where('id',$id)
              ->first();

      return view('user.team.edit')->withTeam($team);
    }

    public function details($id)
    {

      return view('user.team.details');
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

      $request->session()->flash('msg', 'Team Successfully Edited');
      return redirect()->route('team');
    }

    public function store(TeamRequest $request)
    {

        $team_id =DB::table('teams')->insertGetId(
                ['name' => $request->input('team_name'),'total_member' => $request->input('total_member'), 'leader_id' => $request->input('leader_id'),'leader_name' => $request->session()->get('username'), 'description' => $request->input('description')]
        );

        DB::table('team_user')->insert(
            ['user_id'=>$request->session()->get('id'),'team_id'=>$team_id]
        );

        $request->session()->flash('msg', 'Team Create Successful');


        return redirect()->route('team');
    }
}
