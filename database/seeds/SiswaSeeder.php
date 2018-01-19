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
        $k = ['L', 'P'];
        for($i = 0; $i < 20; $i++){
            DB::table('siswa')->insert([
                'nis' => 100+$i,
                'nama' => str_random(10),
                'jurusan_id' => DB::table('jurusan')->get()[rand()%3]->id,
                'kelas_id' => DB::table('kelas')->get()[rand()%5]->id,
                'status' => 'aktif',
                'tahun_ajaran' => 2016,
                'jenis_kelamin' => $k[rand(0, 1)],
                'tpt_lahir' => (rand(0, 1)) ? 'Rumah' : 'Bidan',
                'tgl_lahir' => '1999/1/1',
                'agama' => 'Islam',
                'no_tlp' => '08888'+$i,
            ]);
        }
    }
}
