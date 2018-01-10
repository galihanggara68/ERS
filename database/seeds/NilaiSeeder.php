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
            DB::table('nilais')->insert([
                'guru_id' => DB::table('gurus')->get()[rand()%3]->id,
                'mapel_id' => DB::table('mapels')->get()[rand()%5]->id,
                'siswa_id' => DB::table('siswas')->get()[rand()%19]->id, 
                'pengetahuan' => (rand()%100)+60,
                'keterampilan' => (rand()%100)+60,
                'sisosp' => (rand()%100)+60
            ]);
        }
    }
}
