<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Review;
use Validator;
use Auth;

class ReviewController extends Controller
{
    public function store(Request $request){
    	$validator = Validator::make($request->all(),[
                            'judul' =>'required|max:60',
                            'deskripsi' =>'required|max:1500',
                            'id_ponsel' => 'exists:tb_ponsel,id',]);
		if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }
         // dd($request->all());
         Review::create(['user_id'=>Auth::user()->id,'id_ponsel'=>$request->id_ponsel,'judul'=>$request->judul,'deskripsi'=>$request->deskripsi,'updated_by'=>Auth::user()->id]);
          return redirect(route('smartphone',['id' => $request->id_ponsel])."?ulasan=true#ulasanList")->with(['message_success' => 'Berhasil menambah ulasan']);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
                            'id' =>'required|exists:tb_review_user,id',
                            'id_ponsel' => 'exists:tb_ponsel,id',]);
        if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }
         // dd($request->all());
         $review=Review::where(['id'=>$request->id]);

         if($review->first() != null){
             $review->delete();
             return redirect(route('smartphone',['id' => $request->id_ponsel])."?ulasan=true#ulasanList")->with(['message_success' => 'Berhasil menghapus ulasan']);
         } else{
             return redirect(route('smartphone',['id' => $request->id_ponsel])."?ulasan=true#ulasanList")->with(['message_fail' => 'Gagal menghapus ulasan, ulasan tidak ditemukan']);
         }
    }
     public function update(Request $request){
    	$validator = Validator::make($request->all(),[
                            'id' =>'required|exists:tb_review_user,id',
                            'judul' =>'required|max:60',
                            'deskripsi' =>'required|max:1500',
                            'id_ponsel' => 'exists:tb_ponsel,id',]);
		if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }
         // dd($request->all());
         $review=Review::where(['user_id'=>Auth::user()->id,'id'=>$request->id]);

         if($review->first() != null){
         	 $review->update(['judul'=>$request->judul,'deskripsi'=>$request->deskripsi,'updated_by'=>Auth::user()->id]);
         	 return redirect(route('smartphone',['id' => $review->first()->id_ponsel])."?ulasan=true#ulasanList")->with(['message_success' => 'Berhasil mengubah ulasan']);
         } else{
         	 return redirect(route('smartphone',['id' => $review->first()->id_ponsel])."?ulasan=true#ulasanList")->with(['message_fail' => 'Tidak dapat mengubah ulasan, ulasan tidak ditemukan']);
         }


        
    }
}
