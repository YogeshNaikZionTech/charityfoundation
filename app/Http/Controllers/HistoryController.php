<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('history/history');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function getDHistory(){
        Log::info('get history');
            $user = Auth::user();
        $response_arr = array();
        $response_check = array();
        $user_name = $user->firstname.$user->lastname;

        $card_count = $user->ucard->count();
    Log::info($card_count);
        if($card_count>0){
            //get the list of card of loged in user
            $card_list = $user->Ucard;
            $project_count= $user->project->count();

            if($project_count>0){
            foreach($card_list as $card){
                $receipt_count= $card->receipt->count();
                $receipt_list= $card->receipt;
      //get list of receipts paid by the particular card

                Log::info('log: receiptlist');
                Log::info($project_count);


                    foreach($receipt_list as $rlist){
                        Log::info('rlistif');
                       $rnum= $rlist->receipt_num;
                          //pdonate_reeipt and donate pvoit extraction
                        Log::info($rlist->id);
                        $pdonate=DB::table('receipt_donate')->where('receipt_id',$rlist->id)->first();
                        if(!$pdonate == null){

                            Log::info('log:Pdonate_id form receipt_donate');

                            //donate type and project id extraction
                            $donate_id=DB::table('donate_project')->where('id',$pdonate->pdonate_id)->first();
                            //project title extraction
                            $project = Project::find($donate_id->project_id);

                            $response_check =array("name"=>$user_name,"donation_type"=>$donate_id->donation_type,"project"=>$project->project_Title,"dod"=>$donate_id->updated_at,"amount"=>$rlist->amount_cents,"type"=>$rlist->type,"receipt_id"=>$rnum);
                            array_push($response_arr, $response_check);
                            Log::info($response_arr);
                        }


                    }
                }
            }
        }

        Log::info('Histoty is sent ');
        echo json_encode($response_arr);

    }

    public function getVhistory(){

        //get Loged in user
        $Loged_user = Auth::user();
        $response_arr = array();
        $response_check = array();
        $event_list = $Loged_user->event->all();

        foreach($event_list as $el){

            $start_time = $el->event_StartTime;
            $end_time = $el->event_EndTime;
            $event_name = $el->event_Title;
            $event_status = $el->Status;
            $response_check =array("event_name"=>$event_name,"start_time"=>$start_time,"endt_time"=>$end_time,"event_status"=>$event_status);
            array_push($response_arr, $response_check);
        }

        echo json_encode($response_arr);

    }

    public function getAAFHistory(){

        $loged_user = Auth::user();
        $response_arr = array();
        $response_check = array();
        Log::info('getting AAF history');
        $donation_list = $loged_user->AAFdonate->all();
        foreach($donation_list as $dl){

            $creceipt = $dl->cardreceipt_id;
            $pdonate=DB::table('projectd_receipt')->where('id',$creceipt)->first();
            $response_check =array("donation"=>"AAF","type"=>$dl->donation_type,"amount"=>$pdonate->amount_cents,"receipt_num"=>$pdonate->receipt_num,"dtype"=>$pdonate->type,"dod"=>$pdonate->updated_at);
            array_push($response_arr, $response_check);
        }

        echo json_encode($response_arr);
    }
}
