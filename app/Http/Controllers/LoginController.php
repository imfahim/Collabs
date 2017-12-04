<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function verify(LoginRequest $request)
    {
        // Login System
        $user = DB::table('users')
          ->where('email', $request->Email)
          ->first();

        if($user){
          $check_password = Hash::check($request->Pass, $user->password, []);

          if($check_password){
            Session::put('id', $user->id);
            Session::put('username', $user->name);
            Session::put('email', $user->email);
            Session::put('logged_in', true);

            if($user->type == 1){
              Session::put('is_company', true);

              Session::flash('success', 'Successfully Logged In!' );
              return redirect()->route('company.home');
            }

            Session::put('is_user', true);
            Session::flash('success', 'Successfully Logged In!' );
            return redirect()->route('user.home');
          }

          Session::put('logged_in', false);
          Session::flash('fail', 'Incorrect Credentials, Please Try Again !');
          return redirect()->back();
        }

        Session::put('logged_in', false);
        Session::flash('fail', 'Incorrect Credentials, Please Try Again !');
        return redirect()->back();
    }

    public function logout(){
      Session::flush();

      Session::flash('success', 'You are successfully logged out !');
      return redirect()->route('login');
    }
}
