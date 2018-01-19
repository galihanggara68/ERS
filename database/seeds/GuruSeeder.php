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
        DB::table('guru')->insert(
        [
            'nip' => 201,
            'nama' => "Ujang",
            'jenis_kelamin' => 'L',
            'tpt_lahir' => 'Jakarta',
            'tgl_lahir' => '1999/1/1',
            'agama' => 'Islam',
            'pangkat' => 'Guru',
            'jabatan' => 'Guru Dewasa',
            'status' => 'Aktif',
            'no_tlp' => '088888889',
            'user_id' => 0
        ]);
        DB::table('guru')->insert(
        [
            'nip' => 202,
            'nama' => "Umar",
            'jenis_kelamin' => 'L',
            'tpt_lahir' => 'Jakarta',
            'tgl_lahir' => '1999/1/1',
            'agama' => 'Islam',
            'pangkat' => 'Guru',
            'jabatan' => 'Guru Dewasa',
            'status' => 'Aktif',
            'no_tlp' => '088888889',
            'user_id' => 0
        ]);
        DB::table('guru')->insert([
            'nip' => 203,
            'nama' => "Usep",
            'jenis_kelamin' => 'L',
            'tpt_lahir' => 'Jakarta',
            'tgl_lahir' => '1999/1/1',
            'agama' => 'Islam',
            'pangkat' => 'Guru',
            'jabatan' => 'Guru Dewasa',
            'status' => 'Aktif',
            'no_tlp' => '088888889',
            'user_id' => 0
        ]);
    }
}
