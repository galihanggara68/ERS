<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GuruKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurukelas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('guru_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            $table->integer('mapel_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gurukelas');
    }
}
