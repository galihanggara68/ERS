<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nip', 'nama', 'user_id'];
    public $timestamps = false;

    public function walikelas(){
        return $this->hasOne('App\Kelas');
    }

    public function mengajar(){
        return $this->belongsToMany('App\Kelas', 'gurukelas')
        ->withPivot('mapel_id');
    }

    public function mapel(){
        return $this->belongsToMany('App\Mapel', 'gurukelas')
        ->withPivot('kelas_id');
    }

    public function jurusan(){
        return $this->hasOne('App\Jurusan');
    }

    public function nilai(){
        return $this->belongsToMany('App\Siswa', 'nilais');
    }

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    //Validator
    public static function valid(){
        return [
            'nip' => 'required|max:13',
            'nama' => 'required|max:28'
        ];
    }
}
