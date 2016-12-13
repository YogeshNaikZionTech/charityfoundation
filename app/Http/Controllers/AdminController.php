<?php

namespace App\Http\Controllers;
use App\contactus;
use App\Event;
use App\Project;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\admin;
use DB;
use Illuminate\Support\Facades\Auth;

class  AdminController extends Controller
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

                        }
                    }
                    $user_time = $user->created_at;
                    $user_since= $user_time->format('Y-m-d');
                    Log::info($user_since);
                    $user_check = array("firstname"=>$user->firstname, "lastname" => $user->lastname, "email" => $user->email, "phonenum" => $user->phonenum, "user_since" => $user_since, "total_donation" => $tsum);
                    array_push($user_response, $user_check);
                }
            }

        }
        Log::info('search is sent ');
        echo json_encode($user_response);

      }



    public  function getAllUsers(){

        Log::info('sending all user for AD');
        if(Auth::check()&& Auth::user()->isAdmin){

            $user_list = User::all();
            $user_check = array();
            $user_response = array();

            foreach ($user_list as $user_slug) {
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

                            }
                        }

                    }
                $user_since= ($user_slug->created_at)->format('Y-m-d');

                $user_check = array("firstname" => $user_slug->firstname, "lastname" => $user_slug->lastname, "email" => $user_slug->email, "phonenum" => $user_slug->phonenum, "user_since" => $user_since, "total_donation" => $tsum);
                array_push($user_response, $user_check);
            }

            return json_encode($user_response);
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
            $user_since= ($user->created_at)->format('Y-m-d');
            $user_check = array('id'=>$user->id, 'firstname'=>$user->firstname, 'lastname'=>$user->lastname,'email'=>$user->email,'phonenum'=>$user->phonenum, 'street'=>$user->street,'aptNo'=>$user->street,'state'=>$user->state,'country'=>$user->country,'zipcode'=>$user->zipcode,'user_since'=>$user_since);
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
     * @return json
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
        if(Auth::check()&& Auth::user()->isAdmin){
            Log::info('this is userpagination');
            $user_check = array();
            $user_response = array();
            foreach ($user_list as $user_slug) {
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
                        }
                    }
                    $user_since= ($user_slug->created_at)->format('Y-m-d');

                    $user_check = array("firstname" => $user_slug->firstname, "lastname" => $user_slug->lastname, "email" => $user_slug->email, "phonenum" => $user_slug->phonenum, "user_since" => $user_since, "total_donation" => $tsum);
                    array_push($user_response, $user_check);
                }
            }
            Log::info('search is sent ');
            return json_encode($user_response);
        }else{
            echo 'You are not authorized, please login';
        }
    }


    public function donationTable(){
        Log::info('Admin panel donation request recevied');
            $user_l = User::has('ucard')->get();
        $response_arr = array();
        $response_check = array();
        foreach($user_l as $user){
        $user_name = $user->firstname.$user->lastname;
        $card_count = $user->ucard->all();
        if($card_count>0){
            //get the list of card of loged in user
            $card_list = $user->Ucard->all();
            foreach($card_list as $card) {
                $receipt_count = $card->receipt->count();
                //get list of receipts paid by the particular card
                $receipt_list = $card->receipt;
                if ($receipt_count > 0) {
                    foreach ($receipt_list as $rlist) {
                        $rlist->receipt_num;
                        //pdonate_reeipt and donate pvoit extraction
                        $pdonate = DB::table('receipt_donate')->where('receipt_id', $rlist->id)->first();
                        if(!$pdonate==null){
                            //donate type and project id extraction
                            $donate_id = DB::table('donate_project')->where('id', $pdonate->pdonate_id)->first();
                            //project title extraction
                            $project = Project::find($donate_id->project_id);
                            $response_check = array("name" => $user_name, "donation_type" => $donate_id->donation_type, "project" => $project->project_Title, "dod" => $donate_id->updated_at,"type"=>$rlist->type,"amount" => $rlist->amount_cents);
                            array_push($response_arr, $response_check);
                        }
                    }
                }
            }
            }
        }
        Log::info('Histoty is sent ');
        return json_encode($response_arr);


    }






/*
 * export the donation data to a .xls file.
 */
    public function exportDonation(){
        Log::info('Admin panel export donation request recevied');
        $user_l = User::has('ucard')->get();
        $response_arr = array();
        $response_check = array();
        foreach($user_l as $user){
            $user_name = $user->firstname.$user->lastname;
            $card_count = $user->ucard->all();
            if($card_count>0){
                //get the list of card of loged in user
                $card_list = $user->Ucard->all();
                foreach($card_list as $card) {
                    $receipt_count = $card->receipt->count();
                    //get list of receipts paid by the particular card
                    $receipt_list = $card->receipt;
                    if ($receipt_count > 0) {
                        foreach ($receipt_list as $rlist) {
                            $rlist->receipt_num;
                            //pdonate_reeipt and donate pvoit extraction
                            $pdonate = DB::table('receipt_donate')->where('receipt_id', $rlist->id)->first();
                            if(!$pdonate==null){
                                //donate type and project id extraction
                                $donate_id = DB::table('donate_project')->where('id', $pdonate->pdonate_id)->first();
                                //project title extraction
                                $project = Project::find($donate_id->project_id);

                                $response_check = array("name" => $user_name, "donation_type" => $donate_id->donation_type, "project" => $project->project_Title, "dod" => $donate_id->updated_at, "type"=>$rlist->type,"amount" => $rlist->amount_cents);
                                array_push($response_arr, $response_check);
                            }

                        }
                    }
                }
            }
        }
        \Excel::create('Donations', function($excel) use ($response_arr) {
            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Donations');
            $excel->setCreator('Web Autogenerated')->setCompany('AAFoundation');
            $excel->setDescription('donations');
            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($response_arr) {
                $sheet->fromArray($response_arr, null, 'A1', false, true);
            });
        })->export('xls');
    }


    public function getAllAFFHistory(){
        $user_list = User::all();
        foreach($user_list as $user)
        $response_arr = array();
        $response_check = array();
        Log::info('getting AAF history');
        $donation_list = $user->AAFdonate->all();
        foreach($donation_list as $dl){
            $creceipt = $dl->cardreceipt_id;
            $pdonate=DB::table('projectd_receipt')->where('id',$creceipt)->first();
            $response_check =array("firstname">$user->firstname,"donation"=>"AAF","type"=>$dl->donation_type,"amount"=>$pdonate->amount_cents,"receipt_num"=>$pdonate->receipt_num,"dod"=>$pdonate->updated_at);
            array_push($response_arr, $response_check);
        }
        echo json_encode($response_arr);
    }


    public function getAllVhistory(){
        $user_list = User::all();
        $response_arr = array();
        $response_check = array();
        foreach($user_list as $user){
            $event_list = $user->event->all();
            foreach($event_list as $el){
                $pivot_value = DB::table('voulnteer_event')->get();
                foreach($pivot_value as $pi){
                    $user = User::find($pi->user_id);
                    $event = Event::find($pi->event_id);
                    $dov = ($pi->created_at);
                    $response_check =array("lastname"=>$user->lastname,"firstname"=>$user->firstname,"event_name"=>$event->event_Title,"start_time"=>$event->event_StartTime,"endt_time"=>$event->end_EndTime,"dov"=>$dov,"event_status"=>$event->event_Status);
                    array_push($response_arr, $response_check);
                }
            }
        }
        echo json_encode($response_arr);
    }

    /*
     * return all the data that came through contact us page
     */
    public function getContactData()
    {
        $contact_data = contactus::all()->where('from','contact');
        $response_arr = array();
        $response_check = array();
        foreach ($contact_data as $cd) {
            $response_check = array("name" => $cd->name, "email" => $cd->email, "message" => $cd->message, "from" => $cd->from);
            array_push($response_arr, $response_check);
        }
        echo json_encode($response_arr);
    }


    /*
     * return all the data that came through suggestion on welcome page
     */
        public function getSuggestData(){
            $contact_data = contactus::all()->where('from','suggestion');
            $response_arr = array();
            $response_check = array();
            foreach($contact_data as $cd){
                $response_check = array("name"=>$cd->name,"email"=>$cd->email, "message"=>$cd->message, "from"=>$cd->from);
                array_push($response_arr, $response_check);
            }
            echo json_encode($response_arr);
        }

        /*
         * send user ID to make auser Admin.
         */
        public function makeAdmin(Request $request){

            $this->validate($request, array(
                'user_id' => 'required',

            ));

            $user_id = User::find($request->user_id);
            $user_id->isAdmin = true;
            $user_id->save();

        }


        //just changed the name yet to impleted all the functionalty
    public function searchdonationTable($var){
        Log::info('Admin seachring user in donation');
        $user_l = User::has('ucard')->get();
        $response_arr = array();
        $response_check = array();
        $user_name ="";
        foreach($user_l as $user){
            $user_name = $user->firstname." ".$user->lastname;
            $card_count = $user->ucard->all();

                if ($card_count > 0) {
                    if (stripos($user_name, $var) !== false) {
                    //get the list of card of loged in user
                    $card_list = $user->Ucard->all();
                    foreach ($card_list as $card) {
                        $receipt_count = $card->receipt->count();
                        //get list of receipts paid by the particular card
                        $receipt_list = $card->receipt;
                        if ($receipt_count > 0) {
                            foreach ($receipt_list as $rlist) {
                                $rlist->receipt_num;
                                //pdonate_reeipt and donate pvoit extraction
                                $pdonate = DB::table('receipt_donate')->where('receipt_id', $rlist->id)->first();
                                if (!$pdonate == null) {
                                    //donate type and project id extraction
                                    $donate_id = DB::table('donate_project')->where('id', $pdonate->pdonate_id)->first();
                                    //project title extraction
                                    $project = Project::find($donate_id->project_id);
                                    $response_check = array("name" => $user_name, "donation_type" => $donate_id->donation_type, "project" => $project->project_Title, "dod" => $donate_id->updated_at, "type" => $rlist->type, "amount" => $rlist->amount_cents);
                                    array_push($response_arr, $response_check);
                                }
                            }
                        }
                    }
                }
            }
        }

        Log::info('Histoty is sent ');
        return json_encode($response_arr);


    }

}














