<?php

namespace App\Http\Controllers;

use App\Project;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{

	public function show(){

        $projectc = Project::paginate(3);
        $eventc = Event::paginate(3);
//		$projectf =Project::Where('project_Status','=','future')->paginate(3);
//		$projectp =Project::Where('project_Status','=','completed')->paginate(3);


		return view('welcome')->withProjects_c($projectc)->withEvents_c($eventc);

	}
}
