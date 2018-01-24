<?php namespace App\Transformers;
use League\Fractal\TransformerAbstract;

class MapelTransformer extends TransformerAbstract{
    public function transform($mapel){
        return [
            'kode' => $mapel->kode,
            'nama' => $mapel->nama,
            'kelas' => $mapel->kelas()
        ];
    }
}