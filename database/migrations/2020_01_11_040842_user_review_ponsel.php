<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserReviewPonsel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_review_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',20);
            $table->string('id_ponsel',60);
            $table->string('judul',60);
            $table->longtext('deskripsi');
            $table->string('updated_by',20);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('tb_review_user');
    
    }
}
