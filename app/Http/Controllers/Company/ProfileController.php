<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
class ProfileController extends Controller
{
    /*ki?
    //store hoy na. ei error
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $companydetails = DB::table('companydetails')
                      ->where('companyId',Session::get('id'))
                      ->first();




      if(!$companydetails){
        $company = DB::table('users')
                        ->where('id',Session::get('id'))
                        ->first();
        Session::put('menu', 'profile');
        return view('company.profile.profile')->with('company',$company);

      }

      $company = DB::table('users')
        ->join('companydetails', 'users.id', '=', 'companydetails.companyId')
        ->where('users.id', Session::get('id'))
        ->first();



//aeta to ager cntroooer er :3 ar  db- _te -___-t_______o- join nai..
      Session::put('menu', 'profile');
      return view('company.profile.profile')->with('company', $company);
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
    public function store(Request $request)
    {
      $id =DB::table('companydetails')->insertGetId(
              ['companyId' => $request->session()->get('id'),
              'city' => $request->input('city'),
              'contactNo'=>$request->input('contactNo'),
              'website'=>$request->input('website'),
              'about'=>$request->input('about')
            ]
          );
             return redirect()->route('company.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ae view te ashtse koi tidy_diagnose. index diye
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
    public function update(Request $request)
    {
      $updateCompany=array(
              'companyId' => Session::get('id'),
              'city' => $request->input('city'),
              'contactNo' => $request->input('contactNo'),
              'website' => $request->input('website'),
              'about' => $request->input('about')

          );

    DB::table('companydetails')
          ->where('id', $request->input('id'))
          ->update($updateCompany);

      return redirect()->route('companyprofile.index');
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
}
