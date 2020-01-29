<?php 
namespace App\Helpers;
use App\Model\SmartphoneProdusen as SP;
use App\Model\ImagesStorage;
use App\Model\Review;


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



}