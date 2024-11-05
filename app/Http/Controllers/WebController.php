<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('home');
    }

    public function welcome(){
        return view('welcome');
    }


    public function pricing(){
        return view("pricing");
    }

    public function feedback(){
        return view("feedback");
    }
}
