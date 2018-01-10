<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['nama', 'guru_id'];
    public $timestamps = false;

    public function siswa(){
        return $this->hasMany('App\Siswa');
    }

    public function kaprog(){
        return $this->belongsTo('App\Guru', 'guru_id');
    }
}
