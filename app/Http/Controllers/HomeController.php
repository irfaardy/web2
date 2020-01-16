<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SmartphoneProdusen as SP;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $this->middleware('auth');
        return view('home');
    }

     public function landing()
    {
        $sp = SP::all();
        return view('landingnw')->with(['sp' => $sp]);
    }
}
