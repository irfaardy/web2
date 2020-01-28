<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmartphoneTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('tb_ponsel', function (Blueprint $table) {
            $table->string('chipset',300)->nullable()->after('id_merk');
            $table->string('display',100)->nullable()->after('chipset');
            $table->string('storage',100)->nullable()->after('display');
            $table->string('ram',100)->nullable()->after('storage');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('tb_ponsel', function (Blueprint $table) {
            $table->dropColumn('chipset');
            $table->dropColumn('display');
            $table->dropColumn('storage');
            $table->dropColumn('ram');
        });
    }
}
