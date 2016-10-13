<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects/show');
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
        $filename= 'default.png';
        if ( $request->hasFile('avatar') ) {
            $project_image = $request->file('pimage');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(300, 300)->save(public_path('/avatars/' . $filename));
        }
        $pname =  $request->input('pname');
        $pdescription =  $request->input('pdescription');
        $project_image = $filename;






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
            $project_show = Project::Where('id','=',$id)->get();
            $project_count = Project::all()->count();
            Log::info('Total project count:'. $project_count);
            if($id < $project_count ){

                foreach($project_show as $value){Log::info('the values'. $value->id);
                    $response_array = array("id"=>$value->id, "project_Title"=>$value->project_Title, "project_Description"=>$value->project_Description, "project_Date"=>$value->project_Date,"project_Location"=>$value->project_Location,"project_StartTime"=>$value->project_StartTime);
                }

                echo json_encode($response_array);

            }else{

                echo 'No project prest with that id';
            }


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $project_delete= Event::Where('id','=',$id)->get();
        $project_delete->delete();
        echo 'deleted';
    }
}