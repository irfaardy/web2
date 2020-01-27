<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SmartphoneProdusen as SP;
use App\Model\Smartphone;
use App\Model\Article;

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
        $ark = Article::latest()->limit(4)->get();
        $arkslide = Article::latest()->limit(4)->get();
        $smartphone = Smartphone::select(['id as id_ponsel','nama','id_merk','spesifikasi','updated_at','updated_by'])->latest()->limit(9)->get();
        return view('landingnw')->with(['sp' => $sp,'smp' =>$smartphone,'ark' => $ark,'ark_slide' => $arkslide]);
    }
}
