<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\admin;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware( 'auth' );
    }
    /**
     * Show the content
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin){
            return view('admin/admin');
        }else{
            echo "your not Admin";
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * TOdo
     *      have to join with the donation table to ge the value(total donation)
     */
    public function  searchUser(Request $request){

        $search_var = $request->input('search_var');
        Log:info('data:'.$search_var);
        $user_list = User::all();
        $user_count = User::all()->count();
        Log::info($user_count);
        Log::info($user_list);
        Log::info($search_var);
        $user_check = array();
        $user_response = array();
        foreach($user_list as $user_slug){
            Log::info($user_slug->firstname);
            $user_name = $user_slug->firstname . $user_slug->lastname;
            if(stripos($user_name, $search_var)!==false){
                $tsum =0;
               $esum=0;
               $psum =0;

               $project =$user_slug->Project()->get();

             if($project->count()){
                 foreach($project as $p){
                     $psum += $p->pivot->project_cents;
                 }
             }
             $tsum = $psum;
                $user_check = array("firstname"=>$user_slug->firstname, "lastname"=>$user_slug->lastname, "email" =>$user_slug->email, "phonenum"=>$user_slug->phonenum,"total_donation" => $tsum);
                array_push($user_response, $user_check);
            }
        }
        echo json_encode($user_response);
    }


    public  function getAllUsers(){
        if(Auth::check()&& Auth::user()->isAdmin){
            $user_list = User::all();
            echo json_encode($user_list);
        }else{
            echo 'You are not authorized, please login';
        }
    }

    /**
     * Export all the in to an excel file.
     * if requied can be exported to pdf.
     */
    public function exportUsers(){


        $users = User::select('id', 'firstname', 'lastname','email','phonenum', 'street','aptNo','state','country','zipcode','created_at')->get();
        \Excel::create('users', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    /**
     * @param $id
     *
     *
     * php tinker tries ;)
     * $user = \App\User::where('id','=','3')->first();
     * $event =$user->Event()->get();
     * foreach($event as $e){ $sum += $e->pivot->event_cents;echo $sum;}
     * Total donation = Event_donation + project_donation;
     * Return donation amount with user deatils.
     * /admin/users/1
     */
    public function userPagination($id){

        //user with donation amount array
        $user_donation =array();
        $perpage =10;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;
        $user_list = User::take($perpage)->skip($start)->get();
        Log::info($user_list);
        foreach($user_list as $u){
            $esum =0;
            $psum =0;
            $event =$u->Event()->get();
            $project =$u->Project()->get();

            foreach($project as $p){
                $psum += $p->pivot->project_cents;
            }

                foreach ($event as $e) {
                    $esum += $e->pivot->event_cents;
                }
                $tsum = $esum+$psum;
                array_push($user_donation,array("firstname" => $u->firstname, "lastname" => $u->lastname, "email" => $u->email, "phonenum" => $u->phonenum, "project_donation"=>$psum,"event_donation"=>$esum,"total_donation" => $tsum));

//                Log::info($user_donation);
//                array_push($user_donation,array("firstname" => $u->firstname, "lastname" => $u->lastname, "email" => $u->email, "phonenum" => $u->phonenum, "total_donation" => $sum));
//                Log::info($user_donation);

        }
        echo json_encode($user_donation);
    }


    public function donationView(){

        //
    }

    



}














