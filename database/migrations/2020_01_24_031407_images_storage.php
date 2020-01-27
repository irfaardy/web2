<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesStorage extends Migration
{
       public function up()
    {
        Schema::create('images_storage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',20);
            $table->string('id_object',60);
            $table->string('type',20);
            $table->string('img_file_name',300);
            $table->string('img_file_name_small',300);
            $table->string('img_link',128);
            $table->string('mime_type',30);
            $table->float('size',20);
            $table->ipAddress('ip_addr');
           
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('images_storage');
    }
}
