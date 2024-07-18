<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    function user(){
        return view('userdash', ['title' => 'Dashboard User']);
    }

    function admin(){
        return view('admindash', ['title' => 'Dashboard Admin']);
    }
}
