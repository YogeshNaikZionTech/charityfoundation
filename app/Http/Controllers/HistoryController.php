<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use DB;
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


    public function getHistory(){
        Log::info('get history');
        $user = Auth::user();
        $response_arr = array();
        $response_check = array();
        $user_name = $user->firstname.$user->lastname;

        $card_count = $user->ucard->all();

        if($card_count>0){
            //get the list of card of loged in user
            $card_list = $user->Ucard->all();

            foreach($card_list as $card){
                $receipt_count= $card->receipt->count();
      //get list of receipts paid by the particular card
                $receipt_list= $card->receipt->all();
                if($receipt_count>0){

                    foreach($receipt_list as $rlist){
                        Log::info($rlist);
                        $rlist->receipt_num;
                        //pdonate_reeipt and donate pvoit extraction
                        $pdonate=DB::table('receipt_donate')->where('receipt_id',$rlist->id)->first();
                        Log::info('thisis'.$pdonate->pdonate_id);
                        //donate type and project id extraction
                        $donate_id=DB::table('donate_project')->where('id',$pdonate->pdonate_id)->first();
                        //project title extraction
                        $project = Project::find($donate_id->project_id);

                        $response_check =array("name"=>$user_name,"donation_type"=>$donate_id->donation_type,"project"=>$project->project_Title,"dod"=>$donate_id->updated_at,"amount"=>$rlist->amount_cents);
                        array_push($response_arr, $response_check);

                    }
                }
            }
        }

        Log::info('Histoty is sent ');
        echo json_encode($response_arr);

    }
}
