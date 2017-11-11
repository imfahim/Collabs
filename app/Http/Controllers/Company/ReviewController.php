<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;
use App\RelContestUser;
use Session;

class ReviewController extends Controller
{
    public function show($participant_id, $project_id){
      // this show page can be viwed by other company
      // so block this by changing the route into post route (so you need delete route for reject) and form from view with hidden id of contest_id
      // to check this contest is belong to the owner or not
      $project = Project::find($project_id);

      return view('company.review.show')->with('project', $project)->with('participant_id', $participant_id);
    }

    public function declare(Request $request){
      $contest_user = RelContestUser::find($request->id);

      $contest_user->status = 1;

      $contest_user->save();

      Session::flash('success', 'Successfully declared as winner !');
      return redirect()->back();
    }

    public function reject(Request $request){
      $contest_user = RelContestUser::find($request->id);

      $contest_user->status = 2;

      $contest_user->save();

      Session::flash('success', 'Successfully rejected !');
      return redirect()->back();
    }
}
