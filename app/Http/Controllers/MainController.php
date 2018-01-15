<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Mapel;
use App\Kelas;
use App\Jurusan;
use App\Guru;
use App\Nilai;
use App\User;
use Sentinel;

class MainController extends Controller
{

    public function __construct(){
        $cred = [
            'email' => 'galih@mail.com',
            'password' => 'admin123'
        ];
        Sentinel::authenticate($cred);
    }

    public function siswa()
    {
        $siswa = Siswa::paginate(15);
        return view('mainview.siswa-tab', ['data' => $siswa]);
    }

    public function kelas(){
        $kelas = Kelas::paginate(15);
        return view('mainview.kelas-tab', ['data' => $kelas]);
    }

    public function guru(){
        $guru = Guru::paginate(15);
        return view('mainview.guru-tab', ['data' => $guru]);
    }

    public function nilai(){
        $nilai = Nilai::paginate(15);
        //dd($nilai);
        return view('mainview.nilai-tab', ['data' => $nilai]);
    }

    public function jurusan(){
        $jurusan = Jurusan::paginate(15);
        return view('mainview.jurusan-tab', ['data' => $jurusan]);
    }

    public function user(){
        $user = User::paginate(15);
        return view('mainview.user-tab', ['data' => $user]);
    }

    public function mapel(){
        $mapel = Mapel::paginate(15);
        return view('mainview.mapel-tab', ['data' => $mapel]);
    }
}
