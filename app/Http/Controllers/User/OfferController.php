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
                ->where('accept','<',4)
                ->get();

      $team_offers = DB::table('hire')
                        ->join('teams','teams.id','=','hire.user_id')
                        ->join('users','users.id','=','hire.company_id')
                        ->where([
                          ['hire.accept','>',3],
                          ['teams.leader_id',session('id')],
                        ])
                        ->select('hire.offer_id','hire.company_id','hire.user_id as team_id','hire.accept','hire.details','users.name as company_name','teams.name as team_name')
                        ->get();
      Session::put('menu', 'offers');
      return view('user.offer.index')->withOffers($offers)->withTeamoffers($team_offers);
    }

    public function companydetails($id){
      $company=DB::table('companydetails')
                ->join('users','users.id','=','companydetails.companyId')
                ->where('users.id',$id)
                ->first();
      return view('user.offer.companydetails')->withCompany($company);
    }

    public function accept($id){
      $get=DB::table('hire')->where('offer_id',$id)->first();
      if($get->accept==0){
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>1]);
      }
      else{
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>5]);

      }

    Session::flash('success', 'Offer Accepted!');
      return redirect()->route('offers');
    }
    public function decline($id){
      $get=DB::table('hire')->where('offer_id',$id)->first();
      if($get->accept==0){
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>3]);
      }
      else{
      DB::table('hire')
          ->where('offer_id',$id)
          ->update(['accept'=>6]);

      }
    Session::flash('success', 'Offer Declined!');
      return redirect()->route('offers');
    }
}
