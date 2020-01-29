<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "tb_review_user";
    protected $fillable = ['user_id','id_ponsel','judul','deskripsi','updated_by','deleted_at'];
}
