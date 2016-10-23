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
     *
     *
     *
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
            if(stripos($user_slug->firstname, $search_var)!==false){

                Log::info('inside if:'.$user_slug);
              $user_check = array("firstname"=>$user_slug->firstname, "lastname"=>$user_slug->lastname, "email" =>$user_slug->email, "phonenum"=>$user_slug->phonenum);
                array_push($user_response, $user_check);
            }
            Log::info($user_response);
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

}














