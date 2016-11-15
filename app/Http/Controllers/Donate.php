<?php

namespace App\Http\Controllers;

use App\Event;
use App\Project;
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
        $this->validate($request, array(
           'other-amt' => 'required|min:1|max:255',
            'CreditCardNumber'=> 'required|max:20',
            'NameOnCard'=>'required|max:35',
            'ExpiryDate'=>'required',
            'ZipCode'=>'required',
            'dtype'=>'required',
            'proevent'=>'required',
            'pname'=>'required',
            'name'=>'required',
            'Email'=>'required|email',
            'phone'=>'required|max:15',

        ));

        $damount = $request->input('other-amt');
        $c_num = $request->input('CreditCardNumber');
        $name_card = $request->input('NameOnCard');
        $expiray_date= $request->input('ExpiryDate');
        $zip = $request->input('ZipCode');
        $dtype = $request->input('dtype');
        $proevent = $request->input('proevent');
        $pname = $request->input('pname');
        $email = $request->input('Email');
        $phone_number = $request->input('phone');

        

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
