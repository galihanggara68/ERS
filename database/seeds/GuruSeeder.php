<?php

use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gurus')->insert(
        [
            'nip' => 201,
            'nama' => "Ujang"
        ]);
        DB::table('gurus')->insert(
        [
            'nip' => 202,
            'nama' => "Umar"
        ]);
        DB::table('gurus')->insert([
            'nip' => 203,
            'nama' => "Usep"
        ]);
    }
}
