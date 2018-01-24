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

    public function siswa()
    {
        if(Sentinel::inRole('admin')){
            $siswa = Siswa::paginate(15);
            return view('mainview.siswa-tab', ['data' => $siswa]);
        }else{
            $user = Sentinel::check();
            $guru = User::find($user->id)->userable;
            $list = $guru->mapel->pluck('nama', 'kode')->toArray();
            return view('mainview.siswa-tab', compact('guru', 'list'));
        }
    }

    public function kelas(){
        $kelas = null;
        if(Sentinel::inRole('admin')){
            $kelas = Kelas::paginate(15);
        }else{
            $user = Sentinel::check();
            $user = User::find($user->id);
            $guru = $user->userable;
            $kelas = $guru->mengajar;
        }
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
        $user = Sentinel::getUserRepository()->paginate(10);
        return view('mainview.user-tab', ['data' => $user]);
    }

    public function mapel(){
        $mapel = Mapel::paginate(15);
        return view('mainview.mapel-tab', ['data' => $mapel]);
    }
}
