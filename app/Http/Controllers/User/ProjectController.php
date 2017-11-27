<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Team;
use App\RelTeamProject;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      Session::put('menu', 'project');

      $my_projects = Project::where('user_id', Session::get('id'))->with('team')->get();

      $accepted_invites = RelTeamProject::where('accept', 1)->get(['team_id', 'project_id']);

      //dd($accepted_invites);

      //$d = Team::where('id', 8)->where('leader_id', Session::get('id'))->get(['id']);

      //dd($d);
      /*
      $data_array = array();
      $index = 0;
      $has_data = false;

      foreach ($accepted_invites as $invite) {
        $data_array['my_teams_ids'] = [
           Team::where('id', $invite->team_id)->where('leader_id', Session::get('id'))->first()['id'],
        ];

        if($data_array['my_teams_ids'][0] !== null){

        }else{
          $has_data = false;
        }


        foreach ($data_array[$index]['my_teams_ids'] as $team_id) {
          $data_array['joined_project_ids'] = [
               RelTeamProject::where('team_id', $team_id->id)->first()['project_id'],
          ];

          //dd($data_array['joined_project_ids']);
          foreach ($data_array['joined_project_ids'] as $project_id) {
            $data_array['joined_projects'] = [
               Project::where('id', $project_id)->with('team')->get(),
            ];
          }
        }

        $index++;
      }



      dd($data_array['joined_projects']);
      /*
      $projectss =DB::table('team_project')
                      ->join('teams', 'teams.id', '=', 'team_project.team_id')
                      ->join('projects','projects.id','=','team_project.project_id')
                      ->where('teams.leader_id',session('id'))
                      ->where('team_project.accept',1)
                      ->get();
      //erkm kore projects ante hobe..first ami kon team er leader..then oi team er project ki ki ache from team_project..then oi id gula theke project :3

      dd($projectss);
      */
      $dummy = [['name' => 'goa', ''], ['name' => 'goa'], ['name' => 'goa'] , ['name' => 'goa']];
      return view('user.projects.index')->with('projects', $my_projects)->with('joined_projects', $dummy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::where('leader_id', Session::get('id'))->get(['id', 'name']);
        return view('user.projects.create')->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
      $extra = [
        'github' => $request->github,
        'youtube' => $request->youtube,
      ];

      $project = new Project;

      $project->user_id = Session::get('id');
      $project->team_id = $request->team;
      $project->name = $request->name;
      $project->details = $request->details;
      $project->extra = json_encode($extra, true);

      $project->save();
      DB::table('team_project')->insert(
              ['team_id' => $request->team,'project_id' => $project->id,'accept'=>1]
      );
      Session::flash('success', 'Project Successfully Added !');
      return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try
      {
          $project = Project::findOrFail($id);

          if($project->user_id === Session::get('id')){
            $project_extra = json_decode($project->extra);
          $teams=DB::table('teams')
                    ->join('team_project','team_project.team_id',"=","teams.id")
                    ->where('team_project.project_id',$id)
                    ->where('team_project.accept',1)
                    ->get();
            return view('user.projects.show')->with('project', $project)->with('extra', $project_extra)
                                                                        -> withTeams($teams);
          }

          Session::flash('fail', 'Your requested project does not exist !');
          return redirect()->route('projects.index');
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('fail', 'Your requested project does not exist !'.' Server Error : '.$e);
        return redirect()->route('projects.index');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try
      {
          $project = Project::findOrFail($id);

          if($project->user_id === Session::get('id')){
            $project_extra = json_decode($project->extra);
            $teams = Team::where('leader_id', Session::get('id'))->get(['id', 'name']);

            return view('user.projects.edit')->with('project', $project)->with('teams', $teams)->with('extra', $project_extra);
          }

          Session::flash('fail', 'Your requested project does not exist !');
          return redirect()->route('projects.index');
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('fail', 'Your requested project does not exist !'.' Server Error : '.$e);
        return redirect()->route('projects.index');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
      // user id checking ta middleware er maddhome korte hobe pore
      $extra = [
        'github' => $request->github,
        'youtube' => $request->youtube,
      ];

      $project = Project::find($request->id);

      $project->user_id = Session::get('id');
      $project->team_id = $request->team;
      $project->name = $request->name;
      $project->details = $request->details;
      $project->extra = json_encode($extra, true);
      $project->status = $request->status;

      $project->save();

      Session::flash('success', 'Project Successfully Edited !');
      return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      try
      {
          $project = Project::findOrFail($request->id);

          if($project->user_id === Session::get('id')){
            // For deleting multiple rows pass the array of ids
            Project::destroy($request->id);

            Session::flash('success', 'Project Successfully Deleted !');
            return redirect()->route('projects.index');
          }

          Session::flash('fail', 'Your requested project does not exist !');
          return redirect()->route('projects.index');
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('fail', 'Your requested project does not exist !'.' Server Error : '.$e);
        return redirect()->route('projects.index');
      }
    }
    public function searchteam($id){
      return view('user.projects.searchteam')->withProjectid($id);

    }
    public function searchresult(Request $request){

      if($request->input('select')==0){
        $teams=DB::table('teams')
                  ->where('description','LIKE','%'.$request->input('search').'%')
                  ->get();
      }
      elseif($request->input('select')==1){
        $teams=DB::table('teams')
                  ->where('name','LIKE','%'.$request->input('search').'%')
                  ->get();
      }

      return view('user.projects.searchresult')->withTeams($teams)
                                          ->withProjectid($request->input('project_id'));

    }
    public function invite($projectid ,$teamid)
    {
      $us = DB::table('team_project')
                ->where('team_id',$teamid)
                  ->where('project_id',$projectid)
                  ->first();

      $thisteam = DB::table('teams')
                ->where('id',$teamid)
                  ->first();

      if($us){
        if($us->accept==0){
          //reqst sent
          Session::flash('fail', 'Request already Sent!' );
        }
        else{
          //already a member
          Session::flash('success', 'Already a member!' );
        }
      }
      else{
      DB::table('team_project')->insert(
          ['project_id'=>$projectid,'team_id'=>$teamid]
      );
      Session::flash('success', 'Request Sent!');
      }


      return redirect()->route('projects.show', [$projectid]);

    }
    public function requests()
    {
      $rqsts=DB::table('team_project')
                ->join('teams', 'teams.id', '=', 'team_project.team_id')
                ->join('projects','projects.id','=','team_project.project_id')
                ->where('teams.leader_id',session('id'))
                ->where('team_project.accept',0)
                ->paginate(3);

      return view('user.projects.requests')->withProjects($rqsts)
                                        ->withHas(count($rqsts));
    }
    public function reqdetails($projectid,$teamid,$userid)
    {
      if($userid!=session('id')){
        Session::flash('fail', 'Not accessible !');
        return redirect()->route('project.requests');
      }
      else{
        $teams=DB::table('team_project')
                  ->join('teams', 'teams.id', '=', 'team_project.team_id')
                  ->where('team_project.project_id',$projectid)
                  ->where('team_project.accept',1)
                  ->get();
        $project=DB::table('projects')->where('id',$projectid)->first();
        return view('user.projects.reqdetails')->withTeams($teams)
                                                ->withProject($project);
      }
    }
    public function reqdecline($id){
      $team=DB::table('team_project')
                ->join('teams', 'teams.id', '=', 'team_project.team_id')
                ->where('team_project.team_project_id',$id)
                ->first();
      if($team->leader_id!=session('id')){
        Session::flash('fail', 'Not accessible !');
        return redirect()->route('project.requests');
      }
      else{
        DB::table('team_project')->where('team_project_id',$id)
                                  ->delete();
        Session::flash('success', 'Successfully declined !');
        return redirect()->route('project.requests');
      }

    }
    public function reqaccept($id){
      $team=DB::table('team_project')
                ->join('teams', 'teams.id', '=', 'team_project.team_id')
                ->where('team_project.team_project_id',$id)
                ->first();
      if($team->leader_id!=session('id')){
        Session::flash('fail', 'Not accessible !');
        return redirect()->route('project.requests');
      }
      else{
        DB::table('team_project')->where('team_project_id',$id)
                                  ->update(['accept'=>1]);
        Session::flash('success', 'Successfully Accepted !');
        return redirect()->route('project.requests');
      }

    }
}
