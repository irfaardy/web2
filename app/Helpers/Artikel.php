<?php 
namespace App\Helpers;
use App\Model\Artikel as ARK;
use App\Model\ImagesStorage;


class Artikel
{
	 public static function getImg($id_sm){
	 	$get = ImagesStorage::where(['id_object' => $id_sm,
	 		'type' => 'ARK'])->limit(10)->get();
	 	return $get;
	 }
	 public static function getLatestImg($id_sm){
	 	$get = ImagesStorage::where(['id_object' => $id_sm,
	 		'type' => 'ARK'])->orderBy('created_at','ASC')->first();
	 	return $get;
	 }

}