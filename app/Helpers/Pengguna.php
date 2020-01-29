<?php 
namespace App\Helpers;
use App\User;

class Pengguna
{
	

	public static function getNama($id){
		$get = User::where('id',$id)->first();
		if($get != null){
			$ret = $get->name;
			} else{
				$ret = '-';
			}
		

		return $ret;
	}

}