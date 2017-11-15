<?php

namespace App\Http\Controllers\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HireController extends Controller
{
    //
    public function index(){

      return view('company.hire.index');
    }
}
