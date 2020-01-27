<?php 
namespace App\Helpers;
use App\Model\SmartphoneProdusen as SP;

class Produsen
{
	public static function get_produsen($id= null){
		if($id != null){
				return SP::where('id',$id)->first();
			} else{

				return SP::all();
			}

	}

	public static function getNama($id){
		$get = SP::where('id',$id)->first();
		if($get != null){
			$ret = $get->nama;
			} else{
				$ret = 'n/a';
			}
		

		return $ret;
	}

}