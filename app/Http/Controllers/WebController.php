<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;

class WebController extends Controller
{
    public function home(){
        $plans = SubscriptionPlan::all();

        return view('subscription-pricing', compact('plans'));
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
