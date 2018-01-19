<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nis',
        'nama',
        'jurusan_id',
        'kelas_id',
        'status',
        'tahun_ajaran',
        'jenis_kelamin',
        'tpt_lahir',
        'tgl_lahir',
        'agama',
        'no_tlp'
    ];
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo('App\Kelas');
    }

    public function mapel(){
        return $this->belongsToMany('App\Mapel', 'nilai', 'siswa_id', 'kode_mapel');
    }

    public function guru(){
        return $this->belongsToMany('App\Guru', 'guru_mapel');
    }

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function jurusan(){
        return $this->belongsTo('App\Jurusan');
    }

    //Validator
    public static function valid(){
        return [
            'nis' => 'required|max:12',
            'nama' => 'required|max:28|min:5'
        ];
    }
}
