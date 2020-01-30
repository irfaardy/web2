<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Model\VotingReview as VR;
use DB;

class VotingReviewController extends Controller
{
   public function up(Request $request){
   		 $validator = Validator::make($request->all(),[
                            'id_review' =>'required|exists:tb_review_user,id',
                           ]);
 	if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
            $err['data'] = ['message' => $error,'error' => true];
             return response()->json($err['data']);

         }
      $get = VR::where(['user_id' => Auth::user()->id,'review_id' => $request->id_review]);

      if($get->count() == 1){
         $cek = VR::where(['user_id' => Auth::user()->id,'review_id' => $request->id_review,'vote_point' => 1])->count();
         if($cek == 1){
            $get->delete();
            $err['data'] = ['message' => 'Vote dibatalkan','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'upcancel'];
         } else{
            $get->update(['vote_point' => 1]);
             $err['data'] = ['message' => 'Vote update','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'up'];
         }
             return response()->json($err['data']);

      } else{
      	$get->create(['user_id' => Auth::user()->id,'review_id' => $request->id_review,'vote_point' => 1]);
      	$err['data'] = ['message' => 'Vote Terkirim','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'up'];
             return response()->json($err['data']);
      }
   } 

   ///////////
   public function down(Request $request){
   	 $validator = Validator::make($request->all(),[
                            'id_review' =>'required|exists:tb_review_user,id',
                           ]);
 	if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
            $err['data'] = ['message' => $error,'error' => true];
             return response()->json($err['data']);

         }
      $get = VR::where(['user_id' => Auth::user()->id,'review_id' => $request->id_review]);

      if($get->count() == 1){
      	 $cek = VR::where(['user_id' => Auth::user()->id,'review_id' => $request->id_review,'vote_point' => -1])->count();
         if($cek == 1){
            $get->delete();
            $err['data'] = ['message' => 'Vote dibatalkan','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'downcancel'];
         } else{
            $get->update(['vote_point' => -1]);

          $err['data'] = ['message' => 'Vote update','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'down'];
         }
             return response()->json($err['data']);

      } else{
      	$get->create(['user_id' => Auth::user()->id,'review_id' => $request->id_review,'vote_point' => -1]);
      	$err['data'] = ['message' => 'Vote Terkirim','error' => false,'total' => $this->count_vote($request->id_review),'type' => 'down'];
             return response()->json($err['data']);
      }
   }

   private function count_vote($id_review){
      $sum = VR::where('review_id',$id_review)->sum('vote_point');

      return $sum;
   }
}
