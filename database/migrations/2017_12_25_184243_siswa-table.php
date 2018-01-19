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
        Schema::create('siswa', function(Blueprint $table){
            $table->increments('id');
            $table->integer('nis');
			$table->string('nama');
            $table->integer('kelas_id');
            $table->integer('jurusan_id');
            $table->char('jenis_kelamin'); 
            $table->string('tpt_lahir');
            $table->date('tgl_lahir'); 
            $table->string('agama');
            $table->string('no_tlp');
            $table->string('status');
        });
        DB::statement("alter table siswa add column tahun_ajaran year");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('siswa');
    }
}
