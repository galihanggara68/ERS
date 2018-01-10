<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama', 'guru_id'];
    public $timestamps = false;

    public function guru(){
        return $this->belongsTo('App\Guru', 'guru_id');
    }

    public function guruKelas(){
        return $this->hasMany('App\GuruKelas');
    }

    public function mapelKelas(){
        return $this->hasMany('App\MapelKelas');
    }

    public function siswa(){
        return $this->hasMany('App\Siswa');
    }
}
