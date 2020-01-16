<?php 
namespace App\Helpers;
use App\Model\SmartphoneProdusen as SP;

class Produsen
{
	public static function get_produsen(){
		return SP::all();
	}
}