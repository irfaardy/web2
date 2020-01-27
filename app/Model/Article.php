<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "tb_artikel";
    	protected $fillable = ['id_artikel','judul','deskripsi','updated_by'];
}
