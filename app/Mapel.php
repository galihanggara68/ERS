<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'kode';
    protected $fillable = ['nama', 'kode'];
    public $timestamps = false;

    public function nilai(){
        return $this->belongsToMany('App\Siswa', 'nilai', 'kode_mapel', 'guru_id');
    }

    public function kelas(){
        return $this->belongsToMany('App\Kelas', 'kelas_mapel', 'kode_mapel', 'guru_id');
    }

    public function guru(){
        return $this->belongsToMany('App\Guru', 'guru_mapel',  'kode_mapel', 'guru_id');
    }
}
