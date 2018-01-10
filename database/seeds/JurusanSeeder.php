<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            'nama' => "Multimedia",
            'guru_id' => 1
        ]);
        DB::table('jurusans')->insert([
            'nama' => "Teknik Sepeda Motor",
            'guru_id' => 2
        ]);
        DB::table('jurusans')->insert([
            'nama' => "Administrasi Perkantoran",
            'guru_id' => 3
        ]);
    }
}
