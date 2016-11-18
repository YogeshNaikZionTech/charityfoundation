<?php

namespace App\Http\Controllers;

use App\Event;
use App\Project;

use App\Ucard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class Donate extends Controller
{
	/**
	 * Donate constructor.
	 * author:Sandeep
     *
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

       Log::info('Request for the donation is recevied');
        $this->validate($request, array(

           'otheramt' => 'required|min:1|max:255',
            'CreditCardNumber'=> 'required|max:20',
            'NameOnCard'=>'required|max:35',
            'type'=>'required',
            'ExpiryDate'=>'required',
            'ZIPCode'=>'required',
            'dtype'=>'required',    //1-time    , or monthly, voulnteer
            'proevent'=>'required', //id of project
            'SecurityCode'=>'required',
        ));

        $u_cardExpiry = $request->input('ExpiryDate');
        Log::info('all values are present: storing the values.');
        $d_amount = $request->input('otheramt');
        $u_month = substr($u_cardExpiry,0,2);
        $u_year=substr($u_cardExpiry,3,4);
        $uExpiry = $u_month.$u_year;
        Log::info($uExpiry);
        //get the current user
        $user = Auth::user();
        Log::info('get the logedin user'. $user->lastname);
        $user_id = $user ->id;

        //make a card model;
        $card = new Ucard();
        $card->user_id = $user_id;

        $card->card_num = $request->input('CreditCardNumber');
        $card->cvv_num = $request->input('SecurityCode');
        $card->expiry_date =$uExpiry;
        $card->name_card = $request->input('NameOnCard');
        $card->zip_code = $request->input('ZIPCode');
        $receipt = $this->generateReceipt();
        //save the card in to User-card table and attach the user to the user_id relationship.


        $card->save();
        Log::info('card details saved');
        $user->Ucard()->save($card);
        Log::info('card attached to the user');
        $card_id = $card->id;
        $id = $request->input('proevent');
        $type_payment = $request->input('dtype');

//        as no money in involved with the events.
//            $event = Event::where('id','=',$id)->first();
//            $event->User()->attach([$user->id=>['event_cents'=>$d_amount, 'user_card'=>$card_id, 'receipt_num'=>$receipt]]);

            //save the eent->users. relation is achieved.
        //attaching user
            $project= Project::where('id','=',$id)->first();
            $project->User()->attach([$user->id=>['project_cents'=>$d_amount, 'user_card'=>$card_id, 'receipt_num'=>$receipt,'donation_type'=>$type_payment]]);


            Log::info('user donate to project request recevied');

        $d=['name'=>$user->lastname];
        Mail::send('email.donateProject', $d, function($message) use ($user){
            $message->to($user->email,$user->lastname)->subject('Donation Receipt');
            $message->from('noreplyaafoundation@gmail.com','AAF');
        });
            return view('/donates/receipt');
    }

    public function manageVoulnteer(Request $request){

        $this->validate($request, array(

            'proevent'=>'required', //id
            'Name' => 'required',
            'Email'=> 'required',
            'Comments' => 'required',
            'Phone'=>'required',
            'type'=>'required', // project or event.
        ));


//decide on time


    }

    public function sendDonatemail(){

//

    }

    public function generateReceipt(){

        $d_date = date('y');
        $month = date('m');
        $day = date('d');
        $rand = mt_rand(1000,9999);
        $prefix='A';
        Log::info('Receipt generated');
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
        Log::info('all values are prest, updating the values.');
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
