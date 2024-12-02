<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;

class WebController extends Controller
{
    public function home(){
        return view('home');
    }

    public function welcome(){
        return view('welcome');
    }


    public function pricing(){
        $plans = SubscriptionPlan::all();

        return view('pricing', compact('plans'));
    }

    public function feedback(){
        return view("feedback");
    }
}
