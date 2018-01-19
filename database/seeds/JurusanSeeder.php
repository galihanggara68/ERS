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
        DB::table('jurusan')->insert([
            'nama' => "Multimedia",
            'guru_id' => 1
        ]);
        DB::table('jurusan')->insert([
            'nama' => "Teknik Sepeda Motor",
            'guru_id' => 2
        ]);
        DB::table('jurusan')->insert([
            'nama' => "Administrasi Perkantoran",
            'guru_id' => 3
        ]);
    }
}
