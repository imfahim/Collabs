<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function store(RegisterRequest $request)
    {
        $encrypted_password = bcrypt($request->input('password'));
        $success = DB::table('users')->insert(
                ['name' => $request->input('name'),'email' => $request->input('email'), 'password' => $encrypted_password,'type'=>$request->input('type') ]
        );

        if($success){
          Session::flash('success', 'Thank you for registering !');
          return redirect()->route('login');
        }

        Session::flash('fail', 'Error Occured, Please try again !');
        return redirect()->back();
    }
}
