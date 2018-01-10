<?php

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            DB::table('siswas')->insert([
                'nis' => 100+$i,
                'nama' => str_random(10),
                'jurusan_id' => DB::table('jurusans')->get()[rand()%3]->id,
                'kelas_id' => DB::table('kelas')->get()[rand()%5]->id,
                'status' => 'aktif',
                'tahun_ajaran' => 2016
            ]);
        }
    }
}
