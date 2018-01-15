<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis', 'nama', 'kelas_id', 'jurusan_id', 'status'];
    public $timestamps = false;

    public function diajar(){
        return $this->belongsToMany('App\Guru', 'nilais');
    }

    public function belajar(){
        return $this->belongsToMany('App\Mapel', 'nilais')
        ->withPivot('guru_id', 'pengetahuan', 'keterampilan', 'sisosp');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas');
    }

    public function jurusan(){
        return $this->belongsTo('App\Jurusan');
    }

    //Validator
    public static function valid(){
        return [
            'nis' => 'required|max:12',
            'nama' => 'required|max:28|min:5'
        ];
    }
}
