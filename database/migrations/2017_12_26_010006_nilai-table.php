<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function(Blueprint $table){
            $table->increments('id');
            $table->integer('guru_id')->unsigned();
            $table->integer('mapel_id')->unsigned();
            $table->integer('siswa_id')->unsigned();
            $table->integer('pengetahuan');
            $table->integer('keterampilan');
            $table->integer('sisosp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilais');
    }
}
