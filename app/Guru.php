<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tpt_lahir',
        'tgl_lahir',
        'agama',
        'pangkat',
        'jabatan',
        'status',
        'no_tlp',
        'user_id'
    ];
    public $timestamps = false;

    public function walikelas(){
        return $this->hasOne('App\Kelas');
    }

    public function mapel(){
        return $this->belongsToMany('App\Mapel', 'guru_mapel', 'guru_id', 'guru_id');
    }

    public function siswa(){
        return $this->belongsToMany('App\Siswa', 'guru_mapel', 'guru_id', 'guru_id');
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
