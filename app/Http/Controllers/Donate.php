<?php

namespace App\Http\Controllers;

use App\Event;
use App\Project;
use App\Ucard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class Donate extends Controller
{
	/**
	 * Donate constructor.
	 * author:Sandeep
	 * Setting all the routes that come to donate page should be authenticated.
	 */
    public function __construct() {
        $this->middleware( 'auth' );
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

            if (!Auth::check() ) {
                \Session::put( 'EventCreated', 'Event created' );
            return view ('auth/login');
        }


	return view('donates/create');

    }

	/**
	 * show the select project page to the user.
	 */
	public function showselectproject(){


		$events = Event::where('event_Status','=','current')->orWhere('event_Status','=','future')->get();
		$project = Project::where('project_Status','=','current')->orWhere('project_Status','=','future')->get();
		return view( 'donates/selectproject')->withEvents($events)->withProjects($project);

	}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        Log::info($request);
        $this->validate($request, array(
            'other-amt' => 'required|min:1|max:255',
            'creditCardNumber'=> 'required|max:20',
            'NameOnCard'=>'required|max:35',
            'ExpiryDate'=>'required',
            'ZipCode'=>'required',
            'dtype'=>'required',    //1-time, or monthly, voulnteer
            'type'=> 'required',    // project,event or foundation.
            'proevent'=>'required', //id of project/event
            'securitycode'=>'required',


        ));
        $d_amount = $request->input('other-amt');
        $u_cardnum = $request->input('creditCardNumber');
        $u_cardname = $request->input('NameOnCard');
        $u_cardExpiry = $request->input('ExpiryDate');
        $u_cardcvv = $request->input('securitycode');
        $u_cardzip = $request->input('zipCode');

        //get the current user
        $user = Auth::user();
        $user_id = $user ->id;

        //make a card mode;
        $card = new Ucard();
        $card->user_id = $user_id;
        $card->card_num = $u_cardnum;
        $card->cvv_num = $u_cardcvv;
        $card->expiry_data =$u_cardExpiry;
        $card->name_card = $u_cardname;
        $card->zip_code = $u_cardzip;
        $receipt = $this->generateReceipt();
        //save the card in to User-card table and attache the user to the user_id- relationship.
        $card->save();
        $user->Ucard()->save($card);
        $card_id = $card->id;
        $id = $request->input('proevent');
        $type_payment = $request->input('dtype');

        $donation_type = $request->input('type');
        if($donation_type === 'event'){
//
//        as no money in involved with the events.
//            $event = Event::where('id','=',$id)->first();
//            $event->User()->attach([$user->id=>['event_cents'=>$d_amount, 'user_card'=>$card_id, 'receipt_num'=>$receipt]]);



        }else if($donation_type === 'project'){

            $project= Event::where('id','=',$id)->first();
            $project->User()->attach([$user->id=>['project_cents'=>$d_amount, 'user_card'=>$card_id, 'receipt_num'=>$receipt]]);
        }

        /**
         * checking if(dtype ){
         *
         * decide if its time or money donation.
         *
         * }
         *
         *
         * //Time -donation
         *  feild:
         *  dtype
         * proevent
         * type
         * if(type = foundation){
         *
         *  no time donation only money donation.
         *
         *
         * }
         *
         * if(dytpe = time){
         *
         * name, email, phone commentes(text)
         *
         * }
         *
         *  URL: /donates  method: post
         *
         * Redirect : -> recipte.
         */

        $damount = $request->input('other-amt');
        $c_num = $request->input('creditCardNumber');
        $name_card = $request->input('NameOnCard');
        $expiray_date= $request->input('ExpiryData');
        $zip = $request->input('Zipcode');
        $dtype = $request->input('dtype');
        $proevent = $request->input('proevent');
        $pname = $request->input('pname');
        $email = $request->input('Email');
        $phone_number = $request->input('phone');



    }

    public function manageVoulnteer(Request $request){

        $this->validate($request, array(

            'proevent'=>'required',
            'Name' => 'required',
            'Email'=> 'required',
            'Comments' => 'required',
            'Phone'=>'required',
            'type'=>'required',
            'proevent'=>'required',









        ));
    }

    public function generateReceipt(){

        $d_date = date('y');
        $month = date('m');
        $day = date('d');
        $rand = mt_rand(1000,9999);
        $prefix='A';
        return $prefix.$d_date.$rand.$month.$day;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'other-amt' => 'required|min:1|max:255',
            'creditCardNumber'=> 'required|max:20',
            'NameOnCard'=>'required|max:35',
            'ExpiryData'=>'required',
            'ZipCode'=>'required',
            'dtype'=>'required',
            'proevent'=>'required',
            'pname'=>'required',
            'name'=>'required',
            'Email'=>'required|email',
            'phone'=>'required|max:15',

        ));
            $event_update =Event::where('id','=', $id)->get();

        $damount = $request->input('other-amt');
        $c_num = $request->input('creditCardNumber');
        $name_card = $request->input('NameOnCard');
        $expiray_date= $request->input('ExpiryData');
        $zip = $request->input('Zipcode');
        $dtype = $request->input('dtype');
        $proevent = $request->input('proevent');
        $pname = $request->input('pname');
        $email = $request->input('Email');
        $phone_number = $request->input('phone');
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

    public function showRecipte(){


	return vieW ('donates/receipt');
    }
}
