<?php

namespace App\Http\Controllers;

use App\Event;
use App\Project;
use App\PVNotiff;
use App\EVNotiff;
use App\Receipt;
use App\Ucard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Session;


class Donate extends Controller
{
    /**
     * Donate constructor.
     * author:Sandeep
     * Setting all the routes that come to donate page should be authenticated.
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            \Session::put('EventCreated', 'Event created');
            return view('auth/login');
        }
        return view('donates/create');
    }


    public function showselectproject()
    {
        $events = Event::where('event_Status', '=', 'current')->orWhere('event_Status', '=', 'future')->get();
        $project = Project::where('project_Status', '=', 'current')->orWhere('project_Status', '=', 'future')->get();
        return view('donates/selectproject')->withEvents($events)->withProjects($project);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * show the select project page to the user.
     * as no money in involved with the events.
     * $event = Event::where('id','=',$id)->first();
     * $event->User()->attach([$user->id=>['event_cents'=>$d_amount, 'user_card'=>$card_id, 'receipt_num'=>$receipt]]);
     * save the eent->users. relation is achieved.
     * attaching user
     **/

    public function store(Request $request)
    {

        Log::info('Request for the donation is recevied');
        $this->validate($request, array(
            'otheramt' => 'required|min:1|max:255',
            'CreditCardNumber' => 'required|max:20',
            'NameOnCard' => 'required|max:35',
            'type' => 'required',
            'ExpiryDate' => 'required',
            'ZIPCode' => 'required',
            'dtype' => 'required',    //1-time    , or monthly
            'proevent' => 'required', //id of project
            'SecurityCode' => 'required',
        ));
        $u_cardExpiry = $request->input('ExpiryDate');
        Log::info('all values are present: storing the values.');
        $d_amount = $request->input('otheramt');
        $u_month = substr($u_cardExpiry, 0, 2);
        $u_year = substr($u_cardExpiry, 3, 4);
        $uExpiry = $u_month . $u_year;
        Log::info($uExpiry);
        //get the current user
        $user = Auth::user();
        Log::info('get the logedin user' . $user->lastname);
        $user_id = $user->id;

        //make a card model;
        $card = new Ucard();
        $card->user_id = $user_id;
        $card->card_num = $request->input('CreditCardNumber');
        $card->cvv_num = $request->input('SecurityCode');
        $card->expiry_date = $uExpiry;
        $card->name_card = $request->input('NameOnCard');
        $card->zip_code = $request->input('ZIPCode');
        //save the card in to User-card table and attach the user to the user_id relationship.
        $card->save();
        Log::info('card details saved');
        $user->Ucard()->save($card);
        Log::info('card attached to the user');

        $receipt_n = $this->generateReceipt();

        $card_id = $card->id;
        $id = $request->input('proevent');
        $type_payment = $request->input('dtype');

        Log::info('saving the donation to d_p table');
        $project = Project::where('id', '=', $id)->first();
        Log::info($project);
        $project->User()->attach([$user->id => ['donation_type' => $type_payment]]);
        Log::info('user donate to project request recevied');
        $curr_donation = DB::table('donate_project')->orderBy('updated_at', 'desc')->first();

        //create receipt entry and save
        $receipt = new Receipt();
        $receipt->card_id = $card_id;
        $receipt->amount_cents = $d_amount;
        $receipt->receipt_num = $receipt_n;
        $receipt->save();
        $receipt_id = $receipt->id;

        //create receipt_donate record (project doantion and receipt table)
        DB::table('receipt_donate')->insert(
            ['pdonate_id' => $curr_donation->id, 'receipt_id'=>$receipt_id,'created_at'=> \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'=> \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),]
        );


        //creating a montly donation trigger.
        if($type_payment == 'monthly'){
            Log::info('pushed in to monthlynotification tabel ');
             DB::table('pm_notif')->insert(
                ['pdonate_id' => $curr_donation->id, 'user_id'=>$user->user_id]
            );

        }
        Log::info('mailing user about the donation');
        $d = ['name' => $user->lastname];
        Mail::send('email.donateProject', $d, function ($message) use ($user) {
            $message->to($user->email, $user->lastname)->subject('Donation Receipt');
            $message->from('noreplyaafoundation@gmail.com', 'AAF');
        });
            Log::info('User redirected to dreceipt');
        return redirect('/dreceipt');


      //  return redirect( '/donates/receipt' )->withReceipt_d($receipt_d);


    }

    public function manageVoulnteer(Request $request)
    {

        /**
         * array:8 [▼
         * "_token" => "kvJlhBGWn9xkqQQJjl86ZaKSuT3pEro5CDaSCx72"
         * "proevent" => "1"
         * "vtype" => "volunteer"
         * "type" => "events"
         * "Name" => "sandeep"
         * "Email" => "s@ff.com"
         * "Phone" => "999-123-2333"
         * "Comments" => "testing for event volunteer"
         * ]
         * **/
        $receipt_d = array();
        $this->validate($request, array(

            'proevent' => 'required', //id
            'Name' => 'required',
            'Email' => 'required',
            'Comments' => 'required',
            'Phone' => 'required',
            'type' => 'required', // project or event.
        ));
        Log::info('All values received');
        $type = $request->input('type');
        $id = $request->input('proevent');
        $user = Auth::user();
        if ($type == 'events') {


            $event = Event::where('id', '=', $id)->first();
            $event->User()->attach($user->id);

            //saving to the event voulnteer notification table
            $evnotif = new EVNotiff();
            $evnotif->user_id = $user->id;
            $evnotif->event_id = $event->id;
            $evnotif->send_status = false;
            $evnotif->save();
            $d = ['name' => $user->lastname,'type'=>'event', 'type_name'=>$event->event_Title];
            Mail::send('email.voulnteer', $d, function ($message) use ($user) {
                $message->to($user->email, $user->lastname)->subject('Voulnteer conformation');
                $message->from('noreplyaafoundation@gmail.com', 'AAF');
            });





        }

        return redirect('/vreceipt');

    }

    public function generateReceipt()
    {

        $d_date = date('y');
        $month = date('m');
        $day = date('d');
        $rand = mt_rand(1000, 9999);
        $prefix = 'A';
        Log::info('Receipt generated');
        return $prefix . $d_date . $rand . $month . $day;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * it is a long process .. :(
     * could not find a way to stop the session re-submiting each time a browser is refeshed.
     *
     */
    public function donateRecipte()

    {   //get the latest entry in the pivot of donate_project
                $donation = DB::table('donate_project')->orderBy('updated_at', 'desc')->first();

        //get receipt _id from above info
        $receipt=DB::table('receipt_donate')->where('pdonate_id', $donation->id)->orderBy('updated_at', 'desc')->first();


        //get receipt number using above project_donation_id
        $receiptd = Receipt::find($receipt->receipt_id);
        $card_id = $receiptd->card_id;
        $card = Ucard::find($card_id);






        $receipt_d= array(
            'type'=>'pd',
            'user_name' => $card->name_card,
            'card_num' => $card->card_num,
            'receipt_num'=>$receiptd->receipt_num,
            'd_type'=>$donation->donation_type,
            'amount'=>$receiptd->amount_cents
        ,
        );

        return view ('/donates/receipt')->withReceipt_d($receipt_d);
    }

    public function VoulnteerRecipte(){
        $receipt_d = array();
        //get voulnteer event details.
        $voul = DB::table('voulnteer_event')->orderBy('updated_at', 'desc')->first();
        //get event details
        $event = Event::where('id', '=', $voul->event_id)->first();
        $receipt_d= array(
            'type'=>'vl',
            'venu' => $event->event_Location,
            'time' => $event->event_StartTime,
            'name'=>$event->event_Title,
                );
        return view ('/donates/receipt')->withReceipt_d($receipt_d);
    }
}
