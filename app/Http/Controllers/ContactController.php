<?php

namespace App\Http\Controllers;

use App\contactus;
use Illuminate\Http\Request;
use App\contact;
use App\Http\Requests;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return view('contactus/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
		$cname = $request->input('name');
	    $email = $request->input('email');
	    $msg = $request->input('message');
	    $contactuser = new contactus();
	    $contactuser->name = $cname;
	    $contactuser->email = $email;
	    $contactuser->message = $msg;
		$contactuser->tstamp = \Carbon\Carbon::now();

	    $contactuser->save();

	    \Session::flash('contact_Success',',we will soon get in touch with you.');
	    return view('contactus/create',array( 'contactuser' => $contactuser));
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
        //
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
}
