<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{

	public function show(){

		$projectc = Project::Where('project_Status','=','current')->get();
		$projectf =Project::Where('project_Status','=','future')->get();
		$projectp =Project::Where('project_Status','=','completed')->get();

		return view('welcome')->withProjects_c($projectc)->withProjects_f($projectf)->withProjects_p($projectp);
	}
}
