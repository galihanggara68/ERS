<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class SiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('nis');
			$table->string('nama');
            $table->integer('kelas_id');
            $table->integer('jurusan_id');
			$table->string('status');
        });
        DB::statement("alter table siswas add column tahun_ajaran year");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('siswas');
    }
}
