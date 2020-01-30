<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Smartphone;
use App\Model\Review;
use App\Model\SmartphoneProdusen as SP;
use DB;


class SmartphoneController extends Controller
{
    public function index(){

    }

    public function merk($id){
    	if(SP::find($id) != null){
    	$smp= Smartphone::select(['id as id_ponsel','chipset','display','storage','ram','nama','id_merk','spesifikasi','updated_at','updated_by'])->where('id_merk',$id)->paginate(12);
    		return view('public.merk_display')->with(['smp'=>$smp,'id' => $id]);
    	} else{
    		return abort(404);
    	}
    }

    public function search(Request $request){
        $smp= Smartphone::select(['id as id_ponsel','chipset','display','storage','ram','nama','id_merk','spesifikasi','updated_at','updated_by'])->where('nama', 'like', "%".$request->q.'%')->orWhere('chipset', 'like', "%".$request->q.'%')->orWhere('storage', 'like', "%".$request->q.'%')->orWhere('display', 'like', "%".$request->q.'%')->orWhere('ram', 'like', "%".$request->q.'%')->paginate(12);
        
            return view('public.smartphone_display')->with(['smp'=>$smp]);
    }

    public function detail($id,Request $request){
    	$smp= Smartphone::select(['id as id_ponsel','chipset','display','storage','ram','nama','id_merk','spesifikasi','updated_at','updated_by'])->where('id',$id)->first();

    	if($smp != null){
            $rev = Review::select(['tb_review_user.user_id','tb_review_user.id','tb_review_user.id_ponsel','tb_review_user.judul','tb_review_user.deskripsi','tb_review_user.updated_by','tb_review_user.updated_at',DB::raw('sum(tb_vote_review.vote_point) as point'),])->leftJoin('tb_vote_review','tb_vote_review.review_id','=','tb_review_user.id')->where('id_ponsel',$id)->groupBy('tb_review_user.id')->orderBy('point','DESC')->paginate(12);
    		return view('public.smartphone_detail')->with(['phone'=>$smp,'review' => $rev]);
    	} else{

    	}
    }
}
