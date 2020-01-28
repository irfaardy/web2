<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;

class ArtikelController extends Controller
{
    public function index(){

    }
    public function detail($id){
    	$ark = Article::where('id_artikel',$id)->first();
    	if($ark != null){
    		return view('public.artikel_display')->with(['ark' => $ark,'id' => $id]);
    	} else{ 
    		return abort(404);
    	}

    }
}
