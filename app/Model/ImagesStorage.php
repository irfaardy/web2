<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagesStorage extends Model
{
	protected $table = 'images_storage';
    protected $fillable = ['user_id','type','id_object','mime_type','img_file_name','img_file_name_small','img_link','size','ip_addr','updated_at','deleted_at','updated_at'];
}
