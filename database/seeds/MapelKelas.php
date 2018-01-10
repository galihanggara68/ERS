<?php

use Illuminate\Database\Seeder;

class MapelKelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 25; $i++){
            DB::table('mapelkelas')->insert([
                'kelas_id' => DB::table('kelas')->get()[(rand()%5)]->id,
                'mapel_id' => DB::table('mapels')->get()[(rand()%5)]->id
            ]);
        }
    }
}
