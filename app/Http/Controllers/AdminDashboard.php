<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Smartphone;
use App\Model\Review;

class AdminDashboard extends Controller
{
    public function index(){

    	
    	$data = [];
    	$label = [];

    	$get = Smartphone::select(['id as id_ponsel','nama'])->limit(6)->get();
    	// dd($get);
    	foreach($get as $g){
    		$data[] = Review::where('id_ponsel',$g->id_ponsel)->count();
    		$label[] = $g->nama;
    	}
    	
    	$data = json_encode($data);
    	$label = json_encode($label);
    	return view('dashboard.index')->with(['data' => $data,'label' => $label]);
    }
}
