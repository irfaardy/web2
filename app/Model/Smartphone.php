<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
        protected $table = "tb_ponsel";
    	protected $fillable = ['id','nama','chipset','display','storage','ram','id_merk','spesifikasi','updated_by','deleted_at'];
}
