<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama', 'guru_id'];
    public $timestamps = false;

    public function mapel(){
        return $this->belongsToMany(Mapel, kelas_mapel);
    }

    public function siswa(){
        return $this->hasMany('App\Siswa');
    }
}
