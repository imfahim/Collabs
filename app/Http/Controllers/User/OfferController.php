<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class OfferController extends Controller
{
    //
    public function index(){
      $offers=DB::table('hire')
                ->join('users','users.id','=','hire.company_id')
                ->where('hire.user_id',session('id'))
                ->get();
      Session::put('menu', 'offers');
      return view('user.offer.index')->withOffers($offers);
    }

    public function companydetails($id){
      $company=DB::table('companydetails')
                ->join('users','users.id','=','companydetails.companyId')
                ->where('users.id',$id)
                ->first();
      return view('user.offer.companydetails')->withCompany($company);
    }

    public function accept($id){
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>1]);


    Session::flash('success', 'Offer Accepted!');
      return redirect()->route('offers');
    }
    public function decline($id){
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>3]);


    Session::flash('success', 'Offer Declined!');
      return redirect()->route('offers');
    }
}
