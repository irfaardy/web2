<?php 
namespace App\Helpers;
use App\Model\SmartphoneProdusen as SP;
use App\Model\ImagesStorage;
use App\Model\Review;
use App\Model\VotingReview as VR;
use Auth;


class Phone
{
	 public static function getImg($id_sm){
	 	$get = ImagesStorage::where(['id_object' => $id_sm,
	 		'type' => 'SMP'])->limit(10)->get();
	 	return $get;
	 }
	 public static function getLatestImg($id_sm){
	 	$get = ImagesStorage::where(['id_object' => $id_sm,
	 		'type' => 'SMP'])->orderBy('created_at','ASC')->first();
	 	return $get;
	 }

	 public static function countReviewer($id){
	 	$get = Review::where('id_ponsel',$id)->count();

	 	return number_format($get);
	 }

	 public static function countReviewVote($id_review){
	 	 $sum = VR::where('review_id',$id_review)->sum('vote_point');

     	 return $sum;
	 }

	  public static function checkReview($id_review,$type){
	  	if($type == 'down'){
	 	 $cek = VR::where(['user_id' => Auth::user()->id,'review_id' => $id_review,'vote_point' => -1])->first();
	 	 if($cek != null){
	 	 	$ret = true;
	 	 } else {
	 	 	$ret = false;
	 	 }
	 	} else 	if($type == 'up'){
     	  $cek = VR::where(['user_id' => Auth::user()->id,'review_id' => $id_review,'vote_point' => 1])->first();
     	   if($cek != null){
	 	 	$ret = true;
		 	 } else {
		 	 	$ret = false;
		 	 }
	 	}
	 	return $ret;
	 	}
	 



}