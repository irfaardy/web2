<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ponsel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('tb_ponsel', function (Blueprint $table) {
            $table->string('id',60)->primary();
            $table->string('nama',60);
            $table->bigInteger('id_merk',false,false);
            $table->longtext('spesifikasi');
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
       Schema::dropIfExists('tb_ponsel');
    }
}
