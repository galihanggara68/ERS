<?php

use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 40; $i++){
            DB::table('nilai')->insert([
                'guru_id' => DB::table('guru')->get()[rand()%3]->id,
                'kode_mapel' => DB::table('mapel')->get()[rand()%5]->kode,
                'siswa_id' => DB::table('siswa')->get()[rand()%19]->id, 
                'kd' => 'MAPEL1'
            ]);
        }
    }
}
