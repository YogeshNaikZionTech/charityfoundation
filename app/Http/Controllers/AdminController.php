<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\admin;

class AdminController extends Controller
{
    /**
     * Show the content 
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        return view('admin/admin');
    }
}