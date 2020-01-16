<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SmartphoneProdusen extends Model
{
    protected $table = "tb_merk_ponsel";
    protected $fillable = ['id','nama','deskripsi','updated_by','deleted_at'];
    
}
