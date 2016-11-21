<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
       
        return view('events/show');
    }

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

    public function store(Request $request)
    {

        Log::info('Request that recevied' . $request);
        $event_Title = $request->input('ename');
        $event_Description = $request->input('edescription');
        $event_location = $request->input('location');
        $event_Date = $request->input('edate');

        $start_time =   $event_Date.' '.$request->input('stime');
        $end_time = $event_Date.' '.$request->input('etime');

        $filename = 'event.jpg';
        if ($request->hasFile('eimage')) {
            $event_image = $request->file('eimage');
            $filename = time() . '.' . $event_image->getClientOriginalExtension();
            Image::make($event_image)->resize(300, 300)->save(public_path('/events/' . $filename));
        }

            $event = new Event();
            $event->event_Title = $event_Title;
            $event->event_Description = $event_Description;
            $event->event_location = $event_location;
            $event->event_Date = $event_Date;
            $event->event_StartTime = $start_time;
            $event->event_EndTime = $end_time;
            $event->event_Image = $filename;
        if($event_Date == date("Y,m,d")){

            $event->event_Status = 'current';

        }elseif ($event_Date > date("Y,m,d")){

            $event->event_Status = 'future';

        }
            Log:info('Event that is being saved:'.$event);
            $event->save();
        \Session::flash( 'EventCreated', 'Event created' );
            return view('/events/show');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response_array = array();
        $event_show = Event::Where('id','=',$id)->get();
        $event_count = Event::all()->count();
        Log::info('Total project count:'. $event_count);
        if($id < $event_count ){

            foreach($event_show as $value){Log::info('the values'. $value->id);
                $response_check= array("id"=>$value->id,"event_Image"=>$value->event_Image, "event_Title"=>$value->event_Title, "event_Description"=>$value->event_Description, "event_Date"=>$value->event_Date,"event_Location"=>$value->event_Location,"event_StartTime"=>$value->event_StartTime, "event_EndTime"=>$value->event_EndTime,"event_Status"=>$value->event_Status);
                array_push($response_array, $response_check);
            }
            echo json_encode($response_array);
        }else{
            echo 'No project present with that id';
        }
    }


    /**
     *
     * Returns the total number of :
     *  Events:
     *  completed:
     *  future:
     *  current:
     */
    public function allEvents(){

        $event_list = Event::all()  ;
        Log::info($event_list);
        echo json_encode($event_list);
    }

    /**
     * Return the paginated view for Event pages
     *
     * @param  \Illuminate\Http\Request  $request
     *  Start page: 1 * 8-8 =0 -> for first page and etc
     *  each time we start from $start and pick 8 events from there.
     */
    public  function  paginateEvents(Request $request){

            $id = $request->input('id');
            $perpage =8;

            $start = ($id>=1) ? ($id*$perpage) - $perpage:0;
        Log:info('Requesting for Events(pagination) from :'. $start);
            $event_all = Event::take($perpage)->skip($start)->get();
        echo json_encode($event_all);

    }

    /**
     * @param  $request
     * pagination for upcomming events
     */

    public function paginateUpcomingEvents(Request $request){

        $id = $request->input('id');
        $perpage =8;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;

        $upcoming_list = Event::where("event_Status","=","future")->take($perpage)->skip($start)->get();
        Log::info($upcoming_list);


        echo json_encode($upcoming_list);

    }

    /**
     * @param  $request
     * pagination for current events
     */

    public function paginateCompletedEvents(Request $request){

        $id = $request->input('id');
        $perpage =8;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;

        $current_list = Event::where("event_Status","=","completed")->take($perpage)->skip($start)->get();
        Log::info($current_list);


        echo json_encode($current_list);

    }





    public function getEventCount(){
        $event_total = Event::all()->count(); ;
        $events_future = Event::Where('event_Status','=','future')->count();
        $events_completed = Event::Where('event_Status','=','completed')->count();
        $events_current = Event::Where('event_Status','=','current')->count();

        $event_counts = array('Total Events'=>$event_total,'events_Current'=>$events_current , 'events_Future'=>$events_future , 'events_Completed'=>$events_completed);
        echo  json_encode($event_counts);
    }


    /**
     * Return total number of completed events
     */
    public  function getCurrentEvents(){
        $events_current = Event::Where('event_Status','=','current')->get();
        echo $events_current;
    }

    public  function getFutureEvents(){
        $events_future = Event::Where('event_Status','=','future')->count();
        echo $events_future;
    }

    /**
     * send all the list fo event description.
     */

    public  function  getAllETitles(){

        $event_description = Event::Select('id','event_title')->get();
        echo json_encode($event_description);
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
    public function update(Request $request)
    {
        
        echo 'Great you got it.';
/**
        $event = Event::where("id","=", $id)->get();




        Log::info('Request that recevied' . $request);
        $event_Title = $request->input('ename');
        $event_Description = $request->input('edescription');
        $event_location = $request->input('location');
        $event_Date = $request->input('edate');

        $start_time =   $event_Date.' '.$request->input('stime');
        $end_time = $event_Date.' '.$request->input('etime');

        $filename = 'event.jpg';
        if ($request->hasFile('eimage')) {
            $event_image = $request->file('eimage');
            $filename = time() . '.' . $event_image->getClientOriginalExtension();
            Image::make($event_image)->resize(300, 300)->save(public_path('/events/' . $filename));
        }


        $event->event_Title = $event_Title;
        $event->event_Description = $event_Description;
        $event->event_location = $event_location;
        $event->event_Date = $event_Date;
        $event->event_StartTime = $start_time;
        $event->event_EndTime = $end_time;
        $event->event_Image = $filename;
        if(Input::has('estatus')){

            $event->event_Status = $request->input('estatus');
        }

        Log:info('Event that is being updated:'.$event);
        $event->update();
        \Session::flash( 'EventUpdate', 'Event updated' );
**/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        echo 'Great you got it.';
//        $event_delete = Event::Where('id','=',$id)->get();
//        $event_delete->delete();
//        echo 'deleted';

    }
}