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
        return $this->belongsToMany('App\Mapel', 'guru_mapel', 'guru_id', 'kode_mapel');
    }

    public function siswa(){
        return $this->belongsToMany('App\Siswa', 'guru_mapel', 'guru_id', 'siswa_id');
    }

    public function kelas(){
        return $this->hasManyThrough('App\Mapel', 'App\Kelas');
    }

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    //Validator
    public static function valid(){
        return [
            'nip' => 'required|max:13',
            'nama' => 'required|max:28',
            'jenis_kelamin'=> 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|max:12|min:5',
            'no_tlp' => 'required|max:13|min:1',
            'pangkat' => 'required|max:12|min:4',
            'jabatan' => 'required|max:12|min:4'
        ];
    }
}
