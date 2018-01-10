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
        for($i = 0; $i < 5; $i++){
            DB::table('mapels')->insert([
                'nama' => "Mapel ".$i
            ]);
        }
    }
}
