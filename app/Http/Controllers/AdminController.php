<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\admin;

class AdminController extends Controller
{
    /**
     * Show the content 
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        return view('admin/admin');
    }

    /**
     * @param Request $request
     * @param $search_var
     *
     * TOdo
     *      have to join with the donation table to ge the value(total donation)
     */
    public function  seachUser(Request $request, $search_var){

        $user_list = User::all();
        $user_respone = array();
        foreach($user_list as $user_slug){

            if(strpos($user_slug->name, $search_var)){

                array_push($user_respone, $user_slug->firstname, $user_slug->lastname,$user_slug->email, $user_slug->phonenum);
            }
        }
    }


}
