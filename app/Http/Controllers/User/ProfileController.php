<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;
use Carbon\Carbon;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userdetails = DB::table('userdetails')
                      ->where('userId',Session::get('id'))
                      ->first();


      if(!$userdetails){
        $users = DB::table('users')
                        ->where('id',Session::get('id'))
                        ->first();
        Session::put('menu', 'profile');
        return view('user.profile.profile')->with('user',$users);

      }

      $userdetails = null;
      $users = DB::table('users')
        ->join('userdetails', 'users.id', '=', 'userdetails.userId')
        ->where('users.id', Session::get('id'))
        ->first();

        //  dd($users->occupation);

//aeta to ager cntroooer er :3 ar  db- _te -___-t_______o- join nai..
      Session::put('menu', 'profile');
      return view('user.profile.profile')->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
          $new_dOB = str_replace('/', '-', $request->dOB);
          $dOB = Carbon::createFromFormat('d-m-Y', $new_dOB)->format('Y-m-d');

          $id =DB::table('userdetails')->insertGetId(
                  ['userId' => $request->session()->get('id'),
                  'dateOfBirth' => $dOB,
                  'city' => $request->input('city'),
                  'gender'=>$request->input('gender'),
                  'contactNo'=>$request->input('contactNo'),
                  'occupation'=>$request->input('occupation'),
                  'website'=>$request->input('website'),
                  'aboutMe'=>$request->input('aboutMe'),
                  'pastExperience'=>$request->input('pastExperience'),
                  'education'=>$request->input('education'),
                  'programmingExperience'=>$request->input('programmingExperience'),
                  'projects'=>$request->input('projects')
                 ]
          );

          return redirect()->route('user.home');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {


      $updateUser=array(
              'userId' => Session::get('id'),
              'city' => $request->input('city'),
              'contactNo' => $request->input('contactNo'),
              'occupation' => $request->input('occupation'),
              'website' => $request->input('website'),
              'aboutMe' => $request->input('aboutMe'),
              'pastExperience' => $request->input('pastExperience'),
              'education' => $request->input('education'),
              'programmingExperience' => $request->input('programmingExperience'),
              'projects' => $request->input('projects'),
          );

    DB::table('userdetails')
          ->where('id', $request->input('id'))
          ->update($updateUser);


      return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showchangepass(){
      return view('user.profile.changepass');
    }

    public function changepass(Request $request){
      // validate
      $this->validate($request,[
        'pass' => 'required|min:6',
        'conpass' => 'required|same:pass',

        ]);


      $user = User::find(Session::get('id'));

      if($user){
        $user->password = bcrypt($request->pass);

        $user->save();
      }

      Session::flash('success', 'Password Successfully changed !');
      return redirect()->route('profile.index');
    }
}
