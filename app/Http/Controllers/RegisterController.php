<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function execute(RegisterRequest $request)
    {
      // Register System

    }
    public function store(RegisterRequest $request)
    {
        $created_at = date('Y/m/d h:i:s', time());
        $id =DB::table('users')->insertGetId(
                ['name' => $request->input('name'),'email' => $request->input('email'), 'password' => $request->input('password'),'type'=>$request->input('type'),'created_at' => $created_at ]
        );


        $request->session()->put('name', $request->input('name'));
        $request->session()->put('id', $id);

        if($request->input('type')==0){
          return redirect()->route('user.home');
        }
        else{
          return redirect()->route('company.home');
        }
    }
}
