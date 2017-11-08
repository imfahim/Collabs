<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Session;
use Illuminate\Support\Facades\DB;



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
          ->where('password', $request->Pass)
          ->first();

        if($user){

          if($user->type == 1){
            Session::flash('success', 'Successfully Logged In!' );
            Session::put('id', $user->id);

            return redirect()->route('company.home');
          }
          else{
          Session::flash('success', 'Successfully Logged In!' );
          Session::put('id', $user->id);

          return redirect()->route('user.home');
        }
        }
    }
}
