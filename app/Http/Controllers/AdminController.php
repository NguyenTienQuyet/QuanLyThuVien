<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    
    public function getHome(){
    	return view('admin.home');
    }

    public function getListRole(){
    	return view('admin.listRole');
    }


}
