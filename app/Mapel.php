<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function nilai(){
        return $this->belongsToMany('App\Siswa', 'nilais');
    }

    public function guruKelas(){
        return $this->belongsToMany('App\Guru', 'gurukelas', 'mapel_id');
    }
}
