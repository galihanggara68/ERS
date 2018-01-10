<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function nilai(){
        return $this->belongsToMany('App\Nilai');
    }

    public function mapelKelas(){
        return $this->hasMany('App\MapelKelas');
    }

    public function guru(){
        return $this->hasMany('App\GuruMapel');
    }
}
