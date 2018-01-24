<?php namespace App\Transformers;
use League\Fractal\TransformerAbstract;

class KelasTransformer extends TransformerAbstract{
    public function transform($kelas){
        return [
            'id' => $kelas->id,
            'nama' => $kelas->nama,
            'guru_id' => $kelas->guru_id
        ];
    }
}