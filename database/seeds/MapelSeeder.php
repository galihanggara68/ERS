<?php

use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 6; $i++){
            DB::table('mapel')->insert([
                'kode' => 'MAPEL'.$i,
                'nama' => "Mapel ".$i,
            ]);
        }
    }
}
