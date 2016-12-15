<?php

namespace App\Http\Controllers;

use App\Project;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{

	public function show(){

        $projectc = Project::paginate(3);
        $eventc = Event::paginate(3);
//		$projectf =Project::Where('project_Status','=','future')->paginate(3);
//		$projectp =Project::Where('project_Status','=','completed')->paginate(3);

            if(Auth::user()){
                $user = Auth::user();
                Log::info('***********USER LOGED IN :'.$user->id."****************");
            }

		return view('welcome')->withProjects_c($projectc)->withEvents_c($eventc);

	}
}
