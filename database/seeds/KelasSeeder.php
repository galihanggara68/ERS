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
        for($i = 1; $i < 6; $i++){
            DB::table('kelas')->insert([
                'nama' => "XI MMD ".$i,
                'guru_id' => DB::table('guru')->get()[rand()%3]->id
            ]);
        }
    }
}
