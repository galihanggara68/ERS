<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('nip')->unsigned();
            $table->string('nama');
            $table->char('jenis_kelamin'); 
            $table->string('tpt_lahir');
            $table->date('tgl_lahir'); 
            $table->string('agama');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('status');
            $table->string('no_tlp');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guru');
    }
}
