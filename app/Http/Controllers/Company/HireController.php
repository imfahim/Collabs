<?php

namespace App\Http\Controllers\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class HireController extends Controller
{
    //
    public function index(){

      return view('company.hire.index');
    }

    public function searchresult(Request $request)
    {
      $this->validate($request,[
        'search' => 'required',
        ]);

      $users = DB::Table('users')
                ->where([
                  ['type','=',0],
                  ['name','LIKE','%'.$request->input('search').'%'],
                ])
                ->orWhere([
                  ['type','=',0],
                  ['email','LIKE','%'.$request->input('search').'%'],
                ])
                ->get();
      return view('company.hire.searchresult')->withUsers($users);
    }
    public function userdetails($id)
    {

      $users = DB::Table('users')
                ->join('userdetails','userdetails.userId','=','users.id')
                ->where('users.id',$id)
                ->first();
      return view('company.hire.userdetails')->withUsers($users);
    }

    public function hire(Request $request)
    {
      $this->validate($request,[
        'details' => 'required',
        ]);

      $user= DB::table('hire')
            ->where('company_id',session('id'))
            ->where('user_id',$request->input('user_id'))
            ->first();

      if(count($user)==0){
      DB::table('hire')->insert(
          ['company_id'=>session('id'),'user_id'=>$request->input('user_id'),'details'=>$request->input('details')]
      );
      Session::flash('success', 'Request Sent!');
      }
      else{
        Session::flash('fail', 'Already Sent!');
      }
      return redirect()->route('hire.index');
    }


    public function invitelist(){
      $user= DB::table('hire')
            ->join('users','users.id','=','hire.user_id')
            ->where('company_id',session('id'))
            ->get();
      return view('company.hire.invitations')->withUsers($user);
    }
}
