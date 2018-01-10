<?php

use Illuminate\Database\Seeder;

class GuruKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 25; $i++){
            DB::table('gurukelas')->insert([
                'guru_id' => DB::table('gurus')->get()[(rand()%3)]->id,
                'kelas_id' => DB::table('kelas')->get()[(rand()%5)]->id,
                'mapel_id' => DB::table('mapels')->get()[(rand()%4)]->id,
            ]);
        }
    }
}
