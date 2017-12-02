<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContestRequest;
use App\Contest;
use App\Team;
use App\Project;
use App\User;
use App\RelContestUser;
use App\RelContestCompany;
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
        $contests_invitations = RelContestCompany::where('company_id', Session::get('id'))->where('status', 0)->get(['id']);
        $joined_contests_ids = RelContestCompany::where('company_id', Session::get('id'))->where('status', 1)->get(['contest_id']);

        $joined_contests = array();

        if(!$joined_contests_ids->isEmpty()){
          foreach ($joined_contests_ids as $contest) {
            $joined_contests[] = Contest::where('id', $contest->contest_id)->first();
          }
        }

        //dd($joined_contests);

        if($contests_invitations){
          $count_invitations = count($contests_invitations);
        }else{
          $count_invitations = 0;
        }

        Session::put('menu', 'contest');
        return view('company.contests.index')->with('contests', $contests)->with('count_invitations', $count_invitations)->with('joined_contests', $joined_contests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('success') && Session::get('success') === 'Successfully Found !'){
          if(Session::has('companies')){
            $companies = Session::get('companies');
            return view('company.contests.create')->with('companies', $companies);
          }else{
            $companies = '';
            return view('company.contests.create')->with('companies', $companies);
          }
        }else{
          $companies = '';
          return view('company.contests.create')->with('companies', $companies);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestRequest $request)
    {
        $new_start_date = str_replace('/', '-', $request->start_date);
        $start_date = Carbon::createFromFormat('d-m-Y', $new_start_date)->format('Y-m-d');

        $new_end_date = str_replace('/', '-', $request->end_date);
        $end_date = Carbon::createFromFormat('d-m-Y', $new_end_date)->format('Y-m-d');

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

    public function request(ContestRequest $request)
    {
        $new_start_date = str_replace('/', '-', $request->start_date);
        $start_date = Carbon::createFromFormat('d-m-Y', $new_start_date)->format('Y-m-d');

        $new_end_date = str_replace('/', '-', $request->end_date);
        $end_date = Carbon::createFromFormat('d-m-Y', $new_end_date)->format('Y-m-d');

        $contest = new Contest;

        $contest->company_id = Session::get('id');
        $contest->title = $request->title;
        $contest->description = $request->description;
        $contest->start_on = $start_date;
        $contest->close_on = $end_date;
        $contest->status = 2;

        $contest->save();

        $last_entry = Contest::orderBy('id', 'desc')->first();

        $count_selected_companies = count($request->companies);

        if($count_selected_companies > 1){
          for($iteration = 0; $iteration < $count_selected_companies; $iteration++){
            $contest_company = new RelContestCompany;

            $contest_company->user_id = Session::get('id');
            $contest_company->contest_id = $last_entry->id;
            $contest_company->company_id = $request->companies[$iteration];
            $contest_company->message = $request->message;

            $contest_company->save();
          }
        }else{
          $contest_company = new RelContestCompany;

          $contest_company->user_id = Session::get('id');
          $contest_company->contest_id = $last_entry->id;
          $contest_company->company_id = $request->companies[0];
          $contest_company->message = $request->message;

          $contest_company->save();
        }

        Session::flash('success', 'Contest Successfully Requested !');
        return redirect()->route('contests.index');
    }

    public function request_invite(Request $request){

      $count_selected_companies = count($request->companies);

      if($count_selected_companies > 1){
        for($iteration = 0; $iteration < $count_selected_companies; $iteration++){
          $check = RelContestCompany::where('contest_id', $request->contest_id)->where('company_id', $request->companies[$iteration])->first();

          if(!$check){
            $contest_company = new RelContestCompany;

            $contest_company->user_id = Session::get('id');
            $contest_company->contest_id = $request->contest_id;
            $contest_company->company_id = $request->companies[$iteration];
            $contest_company->message = $request->message;

            $contest_company->save();
          }else{
            Session::flash('fail', 'Some Selected Companies already got the invitation !');
          }
        }
      }else{
        $check = RelContestCompany::where('contest_id', $request->contest_id)->where('company_id', $request->companies[0])->first();

        if(!$check){
          $contest_company = new RelContestCompany;

          $contest_company->user_id = Session::get('id');
          $contest_company->contest_id = $request->contest_id;
          $contest_company->company_id = $request->companies[0];
          $contest_company->message = $request->message;

          $contest_company->save();
        }else{
          Session::flash('fail', 'Some Selected Companies already got the invitation !');
          return redirect()->back();
        }
      }

      Session::flash('success', 'Contest Successfully Requested !');
      return redirect()->back();
    }

    public function show_invitation_list(Request $request){
      $contests_invitations_sent = RelContestCompany::where('user_id', Session::get('id'))->get(['contest_id', 'company_id', 'message', 'status']);
      $contests_invitations_received = RelContestCompany::where('company_id', Session::get('id'))->where('status', 0)->get(['id', 'user_id', 'contest_id', 'message']);

      // Sent Invitations
      $data_sent_array = array();
      $data_sent_has = false;

      if(!$contests_invitations_sent->isEmpty()){
        $data_sent_has = true;

        foreach ($contests_invitations_sent as $invitation) {
          $data_sent_array[] = [
            'contest' => Contest::where('id', $invitation->contest_id)->get(['title', 'description']),
            'company_name' => User::where('id', $invitation->company_id)->first()['name'],
            'message' => $invitation->message,
            'status' => $invitation->status,
          ];
        }
      }
      // -------------------------------------------

      // Received Invitations
      $data_rec_array = array();
      $data_rec_has = false;

      if(!$contests_invitations_received->isEmpty()){
        $data_rec_has = true;

        foreach ($contests_invitations_received as $invitation) {
          $data_rec_array[] = [
            'id' => $invitation->id,
            'contest' => Contest::where('id', $invitation->contest_id)->get(['title', 'description', 'start_on', 'close_on']),
            'user_name' => User::where('id', $invitation->user_id)->first()['name'],
            'message' => $invitation->message,
          ];
        }
      }
      // -------------------------------------------

      return view('company.contests.invitations')->with('sent_inviations', $data_sent_array)->with('data_sent_has', $data_sent_has)->with('received_invitations', $data_rec_array)->with('data_rec_has', $data_rec_has);
    }

    public function invitation_accept(Request $request){
      $invitation = RelContestCompany::find($request->id);

      $invitation->status = 1;

      $invitation->save();

      $contest = Contest::find($invitation->contest_id);

      $contest->status = 0;

      $contest->save();

      Session::flash('success', 'Successfully Accepted !');
      return redirect()->route('company.invitations.list');
    }

    public function invitation_reject(Request $request){
      $invitation = RelContestCompany::find($request->id);

      $invitation->status = 2;

      $invitation->save();

      $contest = Contest::find($invitation->contest_id);

      $contest->status = 1;

      $contest->save();
      //Contest::destroy($invitation->contest_id);

      Session::flash('success', 'Successfully Rejected !');
      return redirect()->route('company.invitations.list');
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
            $joined = RelContestCompany::where('contest_id', $id)->where('status', 1)->first();
            $company_ids = RelContestCompany::where('contest_id', $id)->where('status', 1)->get(['company_id']);

            $companies = array();

            if(!$company_ids->isEmpty()){
              foreach ($company_ids as $company) {
                $companies[] = User::where('id', $company->company_id)->first(['id', 'name', 'email']);
              }
            }

            if($contest->company_id === Session::get('id') || $joined->company_id === Session::get('id')){
              $owner = User::where('id', $contest->company_id)->first(['id', 'name', 'email']);
              $participations = RelContestUser::where('contest_id', $contest->id)->get(['id', 'team_id', 'project_id', 'status']);

              $data_array = array();

              foreach ($participations as $participation) {
                $data_array[] = [
                  'id' => $participation->id,
                  'team_name' => Team::where('id', $participation->team_id)->first()['name'],
                  'team_id' => Team::where('id', $participation->team_id)->first()['id'],
                  'project_id' => $participation->project_id,
                  'project_name' => Project::where('id', $participation->project_id)->first()['name'],
                  'status' => $participation->status,
                  'teams'=>DB::table('team_project')
                              ->join('teams','teams.id','=','team_project.team_id')
                              ->where('team_project.project_id',$participation->project_id)
                              ->where('team_project.accept',2)
                              ->get(),
                ];

              }




              return view('company.contests.show')->with('contest', $contest)->with('participants', $data_array)->with('companies', $companies)->with('owner', $owner);
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
            $joined = RelContestCompany::where('contest_id', $id)->where('status', 1)->first();

            if($contest->company_id === Session::get('id') || $joined->company_id === Session::get('id')){

              /*
              $old_start_date = str_replace('-', '/', $contest->start_on);
              $start_date = Carbon::createFromFormat('Y-m-d', $old_start_date)->format('d-m-Y');

              $old_end_date = str_replace('-', '/', $contest->close_on);
              $end_date = Carbon::createFromFormat('Y-m-d', $old_end_date)->format('d-m-Y');
              */
              /*
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
              */

              /*
              $dates = [
                'start_date' => $start_date,
                'end_date' => $end_date
              ];
              */

              return view('company.contests.edit')->with('contest', $contest);
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
    public function update(ContestRequest $request)
    {
        // company id checking ta middleware er maddhome korte hobe pore

        $contest = Contest::find($request->id);

        $new_start_date = str_replace('/', '-', $request->start_date);
        $start_date = Carbon::createFromFormat('d-m-Y', $new_start_date)->format('Y-m-d');

        $new_end_date = str_replace('/', '-', $request->end_date);
        $end_date = Carbon::createFromFormat('d-m-Y', $new_end_date)->format('Y-m-d');

        $contest->company_id = Session::get('id');
        $contest->title = $request->title;
        $contest->description = $request->description;
        $contest->start_on = $start_date;
        $contest->close_on = $end_date;
        $contest->status = ($request->status) ? 0 : 1;

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
            $joined = RelContestCompany::where('contest_id', $id)->where('status', 1)->first();

            if($contest->company_id === Session::get('id') || $joined->company_id === Session::get('id')){
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

    public function new_invite($contest_id){
      if(Session::has('success') && Session::get('success') === 'Successfully Found !'){
        if(Session::has('companies')){
          $companies = Session::get('companies');
          return view('company.contests.invite')->with('companies', $companies)->with('contest_id', $contest_id);
        }else{
          $companies = '';
          return view('company.contests.invite')->with('companies', $companies)->with('contest_id', $contest_id);
        }
      }else{
        $companies = '';
        return view('company.contests.invite')->with('companies', $companies)->with('contest_id', $contest_id);
      }
    }

}
