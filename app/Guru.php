<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nip', 'nama'];
    public $timestamps = false;

    public function kelas(){
        return $this->hasOne('App\Kelas');
    }

    public function guruKelas(){
        return $this->hasMany('App\GuruKelas', 'guru_id');
    }

    public function jurusan(){
        return $this->hasOne('App\Jurusan');
    }

    public function nilai(){
        return $this->hasMany('App\Nilai');
    }

    //Validator
    public static function valid(){
        return [
            'nip' => 'required|max:13|unique',
            'nama' => 'required|max:28'
        ];
    }
}
