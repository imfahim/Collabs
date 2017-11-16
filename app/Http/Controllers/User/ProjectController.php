<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Team;
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
      $projects = Project::where('user_id', Session::get('id'))->with('team')->get();
      Session::put('menu', 'project');
      return view('user.projects.index')->with('projects', $projects);
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

            return view('user.projects.show')->with('project', $project)->with('extra', $project_extra);
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
}
