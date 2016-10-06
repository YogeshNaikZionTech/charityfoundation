<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $events_f = Event::Where('event_Status','=','future')->paginate(8);
	    $events_c = Event::Where('event_Status','=','completed')->paginate(8);
	    return view('events/show')->withEvents_f($events_f)->withEvents_c($events_c);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	                $event_Title       =  $request->input('ename');
					$event_Description =  $request->input('edescriiption');
	                $event_location    =  $request->input('location');
					$event_Date        =  $request->input('edate');
					$event_StartTime   =  $request->input('stime');
	                $event_EndTime      = $request->input('etime');
					$event_Image        = $request->input('eimage');
					$event_Status       = $request->input('completed');
					$Category_ID        = $request->input('etime');
    	    $event = new Event();

	    $event->event_Title       = $event_Title;
	    $event->event_Description = $event_Description;
	    $event->event_location    = $event_location;
	    $event->event_Date        = $event_Date;
	    $event->event_StartTime   = $event_StartTime;
	    $event->event_EndTime     = $event_EndTime;
	    $event->event_Image        = $event_Image;
	    $event->event_Status       = $event_Status;
	    $event->Category_ID        = $Category_ID;

		$event->save();
	    return view('welcome');

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
