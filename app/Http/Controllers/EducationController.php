<?php

namespace App\Http\Controllers;

use App\education;
use Illuminate\Http\Request;
use App\edu;
use App\Http\Requests;
use Carbon\Carbon;

class EducationController extends Controller
{
    /**
     * Show the content 
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        return view('education/edu');
    }
}