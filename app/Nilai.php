<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['siswa_id', 'nilai', 'kode_mapel', 'kd'];
    public $timestamps = false;

    public function siswa(){
        return $this->belongsTo('App\Siswa');
    }

    public function mapel(){
        return $this->belongsTo('App\Mapel');
    }

    public function guru(){
        return $this->belongsTo('App\Guru');
    }
}
