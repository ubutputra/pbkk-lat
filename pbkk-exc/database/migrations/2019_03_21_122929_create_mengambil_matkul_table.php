<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMengambilMatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengambil_matkul', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nrp_mhs',50);
            $table->string('nama_matkul',50);
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
        Schema::dropIfExists('mengambil_matkul');
    }
}
