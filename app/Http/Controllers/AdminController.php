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
            echo "you are not Admin";
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * TOdo
     *      have to join with the donation table to ge the value(total donation)
     *
     * to get the amount use:
     *  check if ueer has card: User::has('Ucards')
     *  check for each card in project_Receipt table using   ORM.
     */
    public function  searchUser(Request $request)
    {

        $search_var = $request->input('search_var');
        Log::info('Requesting seach for:data:' . $search_var);
        $user_list = User::all();
        $user_check = array();
        $user_response = array();

        foreach ($user_list as $user_slug) {
            Log::info($user_slug->firstname);
            $user_name = $user_slug->firstname . $user_slug->lastname;
            if (stripos($user_name, $search_var) !== false) {
                $tsum = 0;

                $user = $user_slug;
                $response_arr = array();
                $response_check = array();


                $card_count = $user->ucard->all();
                if ($card_count > 0) {
                    //get the list of card of loged in user
                    $card_list = $user->Ucard->all();

                    foreach ($card_list as $card) {
                        $receipt_count = $card->receipt->count();
                        //get list of receipts paid by the particular card
                        $receipt_list = $card->receipt->all();
                        if ($receipt_count > 0) {

                            foreach ($receipt_list as $rlist) {

                                $tsum += $rlist->amount_cents;

                            }
                            $user_check = array("firstname" => $user_slug->firstname, "lastname" => $user_slug->lastname, "email" => $user_slug->email, "phonenum" => $user_slug->phonenum, "user_since" => $user_slug->created_at, "total_donation" => $tsum);
                            array_push($user_response, $user_check);
                        }
                    }
                }
            }


        }
        Log::info('search is sent ');
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

        $user_response = array();
        $user_check=array();
        //$users = User::select('id', 'firstname', 'lastname','email','phonenum', 'street','aptNo','state','country','zipcode','created_at')->get();
        $users = User::all();
        foreach($users as $user){
            $user_check = array('id'=>$user->id, 'firstname'=>$user->firstname, 'lastname'=>$user->lastname,'email'=>$user->email,'phonenum'=>$user->phonenum, 'street'=>$user->street,'aptNo'=>$user->street,'state'=>$user->state,'country'=>$user->country,'zipcode'=>$user->zipcode,'user_since'=>$user->created_at);
            array_push($user_response,$user_check);
        }
        \Excel::create('users', function($excel) use($user_response) {
            $excel->sheet('Sheet 1', function($sheet) use($user_response) {
                $sheet->fromArray($user_response, null, 'A1', false, true);
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
        }
        echo json_encode($user_donation);
    }


    public function donationTable(){

        $donation_respose = array();
        $donation_check = array();

        //gives array of all the user who have donated to projects
        $users = User::has('project')->get();

        //get the list of project for each user.
        foreach($users as  $user){

            $project_c = $user->project->count();
            if($project_c > 1){
                $projects = $user->project;
                foreach($projects as $p){

                    $donation_check = array("firstname"=>$user->firstname, "lastname"=>$user->lastname,"donation_type"=>$p->pivot->dontaion_type, "DOD"=>$p->pivot->created_at,"amount"=>$p->pivot->project_cents);
                    array_push($donation_respose, $donation_check);
                }
            }else{
                $donation_check = array("firstname"=>$user->firstname, "lastname"=>$user->lastname,"donation_type"=>$p->pivot->dontaion_type, "DOD"=>$p->pivot->created_at,"amount"=>$p->pivot->project_cents);
                array_push($donation_respose, $donation_check);
            }
        }
        echo json_encode($donation_respose);
    }


    public function exportDonation(){

        $donation_response = array();
        $donation_check = array();
        //gives array of all the user who have donated to projects
        $users = User::has('project')->get();

        //get the list of project for each user.
        foreach($users as  $user){

            $project_c = $user->project->count();
            if($project_c > 1){
                $projects = $user->project;
                foreach($projects as $p){

                    $donation_check = array("firstname"=>$user->firstname, "lastname"=>$user->lastname,"donation_type"=>$p->pivot->dontaion_type, "DOD"=>$p->pivot->created_at,"amount"=>$p->pivot->project_cents);
                    array_push($donation_response, $donation_check);
                }
            }else{
                $donation_check = array("firstname"=>$user->firstname, "lastname"=>$user->lastname,"donation_type"=>$p->pivot->dontaion_type, "DOD"=>$p->pivot->created_at,"amount"=>$p->pivot->project_cents);
                array_push($donation_response, $donation_check);
            }
        }

        \Excel::create('Donations', function($excel) use ($donation_response) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Donations');
            $excel->setCreator('Web Autogenerated')->setCompany('AAFoundation');
            $excel->setDescription('donations');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($donation_response) {

                $sheet->fromArray($donation_response, null, 'A1', false, true);
            });

        })->export('xls');
    }



}














