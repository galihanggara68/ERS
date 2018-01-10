<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('kelas')->insert([
                'nama' => "XI MMD ".$i,
                'guru_id' => DB::table('gurus')->get()[rand()%3]->id
            ]);
        }
    }
}
