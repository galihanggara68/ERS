<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['guru_id', 'mapel_id', 'siswa_id', 'pengetahuan', 'keterampilan', 'sisosp'];
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
