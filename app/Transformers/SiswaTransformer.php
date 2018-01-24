<?php namespace App\Transformers;
use League\Fractal\TransformerAbstract;

class SiswaTransformer extends TransformerAbstract{
    public function transform($siswa){
        return [
            'nis' => $siswa->nis,
            'nama' => $siswa->nis,
            'jurusan_id' => $siswa->nis,
            'kelas_id' => $siswa->nis,
            'status' => $siswa->nis,
            'tahun_ajaran' => $siswa->nis,
            'jenis_kelamin' => $siswa->nis,
            'tpt_lahir' => $siswa->nis,
            'tgl_lahir' => $siswa->nis,
            'agama' => $siswa->nis,
            'no_tlp' => $siswa->nis
        ];
    }
}

?>