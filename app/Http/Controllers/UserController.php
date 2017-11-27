<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\User;

class UserController extends Controller
{
    public function index(){

    }

    public function search_companies_by_name(Request $request){
      $companies = User::where('type', 1)->where('name', 'LIKE', '%'.$request->name.'%')->where('id', '<>', Session::get('id'))->get(['id', 'name', 'email']);

      if($companies){
        Session::put('companies', $companies);
        Session::flash('success', 'Successfully Found !');
        return redirect()->back();
      }
      Session::flash('fail', 'Could not Found !');
      return redirect()->back();
    }
}
