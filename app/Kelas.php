<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama', 'guru_id'];
    public $timestamps = false;

    public function mapel(){
        return $this->belongsToMany('App\Mapel', 'kelas_mapel', 'kelas_id', 'kode_mapel');
    }

    public function guru(){
        return $this->belongsToMany('App\Guru', 'guru_kelas');
    }

    public function siswa(){
        return $this->hasMany('App\Siswa');
    }
}
