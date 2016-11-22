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
     *  "pname" => "sandeep"
    "plocation" => "at my home"
    "pdate" => "98/99/99"
    "pstime" => "08:21:56"
    "pdescription" => "sandeep"
    "pimage" => ""
    "_token" => "C7vEztsZQtOe6swjnB8bZcaA8YaPsg14T8dhxMJZ"
    ]
     */
    public function store(Request $request)
    {
        $filename= 'default.png';
        if ( $request->hasFile('pimage') ) {
            $project_image = $request->file('pimage');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(300, 300)->save(public_path('/avatars/' . $filename));
        }
        $pname =  $request->input('pname');
        $pdescription =  $request->input('pdescription');
        $project_image = $filename;

        $project = new Project();
        $project_Date = $request->input('pdate');
        $project->project_Title = $pname;
        $project->project_Description =$pdescription;
       $project->project_Date = $request->input('pdate');
        $project->project_StartTIme =$project_Date.' '.$request->input('pstime');
        $project->project_Image = $request->input('pimage');
        $project->project_Location = $request->input('plocation');
        $pdate = $request->input('pdate');
        Log::info("Before date");
        
        if($pdate == date("Y,m,d")){

            $project->project_Status = 'current';

        }elseif ($pdate > date("Y,m,d")){

            $project->project_Status = 'future';

        }
        Log::info($project);
        $project->save();
        \Session::flash( 'ProjectCreated', 'Project created' );
        return view('/projects/show');
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
        Log::info($project_show);

            if($id < $project_count ){

                foreach($project_show as $value){
                    $response_array = array("id"=>$value->id, "project_Title"=>$value->project_Title, "project_Description"=>$value->project_Description, "project_Date"=>$value->project_Date,"project_Location"=>$value->project_Location,"project_StartTime"=>$value->project_StartTime, "project_Image"=>$value->project_Image, "project_Status"=>$value->project_Status);
                }

                echo json_encode($response_array);

            }else{

                echo 'No project prest with that id';
            }


    }

/**
 * show all projects
 *
 *
 */
    public function allProjects(){

        $project_list = Project::all();
        // log::info('Request all projects:', $project_list);
        echo json_encode($project_list);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * paginate projects
     *
     *
     */

    public function  paginateProjects(Request $request){
        $id = $request->input('id');
        $perpage =8;

        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;
        Log:info('Requesting for Projects(pagination) from :'. $start);
        $project_all = Project::take($perpage)->skip($start)->get();
        echo json_encode($project_all);

    }


    /**
     * send all the list fo event description.
     */

    public  function  getAllETitles(){

        $project_description = Project::Select('id','project_title')->get();
        echo json_encode($project_description);
    }


    /**
     * @param  $id
     *
     * pagination for current events
     */

    public function paginateCurrentProjects($id){



        $perpage =8;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;
        Log::info("start flag:".$start);
        $current_list = Project::where("project_Status","=","Current")->skip($start)->take($perpage)->get();
        Log::info('Requesting for pagination for current projects:'. $current_list);


        echo json_encode($current_list);

    }

    /**
     * @param  $id
     * pagination for current events
     */
    public function paginateUpcomingProjects($id){

        $perpage =8;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;
        Log::info("start flag:".$start);
        Log::info($upcoming_list = Project::where("project_Status","=","future")->get());
        $upcoming_list = Project::where("project_Status","=","future")->skip($start)->take($perpage)->get();
        Log::info('Requesting for pagination for upcoming projects '.$upcoming_list);


        echo json_encode($upcoming_list);

    }
     public function paginateCompletedProjects($id){

        $perpage =8;
        $start = ($id>=1) ? ($id*$perpage) - $perpage:0;

        $current_list = Project::where("project_Status","=","completed")->take($perpage)->skip($start)->get();
        Log::info('Requesting for pagination for completed projects:'. $current_list);


        echo json_encode($current_list);

    }



    public function getProjectCount(){
        $project_total = Project::all()->count(); ;
        $project_future = Project::Where('project_Status','=','future')->count();
        $project_completed = Project::Where('project_Status','=','completed')->count();
        $project_current = Project::Where('project_Status','=','current')->count();
        $projects_counts = array('Total Projects'=>$project_total,'projects_Current'=>$project_current , 'projects_Future'=>$project_future , 'projects_Completed'=>$project_completed);
        echo  json_encode($projects_counts);
    }
    /**
     * count funtions
     */

    public  function getCurrentProject(){
        $project_current = Project::Where('project_Status','=','Current')->get();
        echo json_encode($project_current);
    }

    public  function getFutureProject(){
        $project_future = Project::Where('project_Status','=','future')->count();
        echo $project_future;
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
    public function update(Request $request)
    {

        //Sandeep - I just wrote this update function to test - please check if its ok (-Kim)
        $id = $request->input('id');
        $project = Project::where("id","=", $id)->get();
            Log::info('Input that is to be updated' . $project);
        $project_Title = $request->input('pname');
        $project_Description = $request->input('pdescription');
        $filename = 'project1.jpg';
        if ($request->hasFile('pimage')) {
            $project_image = $request->file('pimage');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(300, 300)->save(public_path('/projects/' . $filename));
        }
         if(Input::has('pstatus')){

            $project->project_Status = $request->input('pstatus');
        }

 Log::info('Project that is being updated:'.$project);
        $project->update();
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
//        $project_delete= Event::Where('id','=',$id)->get();
//        $project_delete->delete();
//        echo 'deleted';
    }
}