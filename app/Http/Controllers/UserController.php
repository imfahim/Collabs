<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;

class UserController extends Controller
{
    public function index(){

    }
    public function profile($id){
      $pro=DB::table('users')
                  ->where('users.id',$id)
                  ->first();
      if($pro){
        if($pro->type==0){
          $profile=DB::table('users')
                      ->join('userdetails','userdetails.userId','=','users.id')
                      ->where('users.id',$id)
                      ->first();
          if(count($profile)!=0){
          $teams=DB::table('teams')->select('id')->where('leader_id',$id)->get();
          $jteams=DB::table('team_user')->select('team_id as id')->where('user_id',$id)->where('invite',1)->get();
          $teams=$teams->merge($jteams);
          $pro=NULL;
          foreach ($teams as $team) {
            foreach ($team as $t) {

            if($pro==null){
              $pro=DB::table('team_project')->where('team_id',$t)->where('accept','>',0)->get();
            }
            else{
              $qpro=DB::table('team_project')->where('team_id',$t)->where('accept','>',0)->get();
              $pro=$pro->merge($qpro);
            }
            }
          }
          $today = date("Y-m-d");
          $age = date_diff(date_create($profile->dateOfBirth), date_create($today));
          $edu=DB::table('user_educations')->where('user_id',$id)->where('edu/job',0)->get();
          $job=DB::table('user_educations')->where('user_id',$id)->where('edu/job',1)->get();
          return view('common.profile')->withProfile($profile)->withDone(count($pro))->withAge($age->y)->withEdu($edu)->withJob($job);
        }
        else{
          return view('common.profile');
        }
        }
          else{
            $profile=DB::table('users')
                        ->join('companydetails','companydetails.companyId','=','users.id')
                        ->where('users.id',$id)
                        ->first();
            return view('common.profile')->withProfile($profile);
          }

      }else{
        Session::flash('fail', 'User not found !');
        return redirect()->back();
      }
    }
    public function messages(){
      $msg=DB::table('user_relation')
                  ->where('user_id1',session('id'))
                  ->orwhere('user_id2',session('id'))
                  ->get();
      return view('common.messages')->withMsg($msg);

    }
    public function UseridToRelationid($id){
      $msg_id=DB::table('user_relation')
                ->where([
                  ['user_id1',$id],
                  ['user_id2',session('id')],
                ])
                ->orWhere([
                  ['user_id1',session('id')],
                  ['user_id2',$id],
                ])
                ->first();
        return $msg_id;
    }
    public function getMessage($id)
    {
      $msg_id=UserController::UseridToRelationid($id);
        $pro=DB::table('users')->where('id',$id)->select('users.name','users.id')->first();
        if(count($msg_id)==0){
          return view('common.messageOf')->withUid($id)->withName($pro)->withMsg($msg_id);
        }
        else{
        $msg=DB::table('messages')->where('msg_id',$msg_id->relation_id)->get();;

        return view('common.messageOf')->withMsg($msg)->withUid($id)->withName($pro);
      }
    }
    public function sendMessage(Request $request){
      $this->validate($request,[
        'msg' => 'required',
        ]);
        $msg_id=UserController::UseridToRelationid($request->input('toid'));

        if(count($msg_id)==0){
          $getid=DB::table('user_relation')->insertGetId(
            ['user_id1'=>session('id'),'user_name1'=>session('username'),'user_id2'=>$request->input('toid'),'user_name2'=>$request->input('toname')]
          );
          DB::table('messages')->insert(
            ['msg_id'=>$getid,'from_id'=>session('id'),'to_id'=>$request->input('toid'),'messages'=>$request->input('msg')]
          );
        }
          else{
            DB::table('messages')->insert(
              ['msg_id'=>$msg_id->relation_id,'from_id'=>session('id'),'to_id'=>$request->input('toid'),'messages'=>$request->input('msg')]
            );
          }

        return redirect()->route('messageOf',$request->input('toid'));
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
