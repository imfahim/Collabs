<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contest;
use App\Team;
use App\Project;
use App\RelContestUser;
use Session;
use Carbon\Carbon;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contests = Contest::where('company_id', Session::get('id'))->get();
        return view('company.contests.index')->with('contests', $contests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.contests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start_date = Carbon::createFromDate($request->start_year, $request->start_month, $request->start_day, 'Asia/Dhaka');
        $end_date = Carbon::createFromDate($request->end_year, $request->end_month, $request->end_day, 'Asia/Dhaka');

        $contest = new Contest;

        $contest->company_id = Session::get('id');
        $contest->title = $request->title;
        $contest->description = $request->description;
        $contest->start_on = $start_date;
        $contest->close_on = $end_date;

        $contest->save();

        Session::flash('success', 'Contest Successfully Added !');
        return redirect()->route('contests.index');
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
            $contest = Contest::findOrFail($id);

            if($contest->company_id === Session::get('id')){
              $participations = RelContestUser::where('contest_id', $contest->id)->get(['id', 'team_id', 'project_id', 'status']);

              $data_array = array();

              foreach ($participations as $participation) {
                $data_array[] = [
                  'id' => $participation->id,
                  'team_name' => Team::where('id', $participation->team_id)->first()['name'],
                  'project_id' => $participation->project_id,
                  'project_name' => Project::where('id', $participation->project_id)->first()['name'],
                  'status' => $participation->status,
                ];
              }

              return view('company.contests.show')->with('contest', $contest)->with('participants', $data_array);
            }

            Session::flash('fail', 'Your requested contest does not exist !');
            return redirect()->route('contests.index');
        }
        catch(ModelNotFoundException $e)
        {
          Session::flash('fail', 'Your requested contest does not exist !'.' Server Error : '.$e);
          return redirect()->route('contests.index');
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
            $contest = Contest::findOrFail($id);

            if($contest->company_id === Session::get('id')){
              // Dates
              $start_date = explode('-', $contest->start_on);
              $end_date = explode('-', $contest->close_on);

              $dates = [
                'start_year' => $start_date[0],
                'start_month' => $start_date[1],
                'start_day' => $start_date[2],
                'end_year' => $end_date[0],
                'end_month' => $end_date[1],
                'end_day' => $end_date[2]
              ];

              return view('company.contests.edit')->with('contest', $contest)->with('dates', $dates);
            }

            Session::flash('fail', 'Your requested contest does not exist !');
            return redirect()->route('contests.index');
        }
        catch(ModelNotFoundException $e)
        {
          Session::flash('fail', 'Your requested contest does not exist !'.' Server Error : '.$e);
          return redirect()->route('contests.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // company id checking ta middleware er maddhome korte hobe pore

        $contest = Contest::find($request->id);

        $start_date = Carbon::createFromDate($request->start_year, $request->start_month, $request->start_day, 'Asia/Dhaka');
        $end_date = Carbon::createFromDate($request->end_year, $request->end_month, $request->end_day, 'Asia/Dhaka');

        $contest->company_id = Session::get('id');
        $contest->title = $request->title;
        $contest->description = $request->description;
        $contest->start_on = $start_date;
        $contest->close_on = $end_date;
        $contest->status = $request->status;

        $contest->save();

        Session::flash('success', 'Contest Successfully Edited !');
        return redirect()->route('contests.index');
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
            $contest = Contest::findOrFail($request->id);

            if($contest->company_id === Session::get('id')){
              // For deleting multiple rows pass the array of ids
              Contest::destroy($request->id);

              Session::flash('success', 'Contest Successfully Deleted !');
              return redirect()->route('contests.index');
            }

            Session::flash('fail', 'Your requested contest does not exist !');
            return redirect()->route('contests.index');
        }
        catch(ModelNotFoundException $e)
        {
          Session::flash('fail', 'Your requested contest does not exist !'.' Server Error : '.$e);
          return redirect()->route('contests.index');
        }
    }

}
