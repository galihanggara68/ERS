<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Mapel, App\Kelas, App\Siswa;
use App\Transformers\MapelTransformer, App\Transformers\KelasTransformer;
use Sentinel;

class ApiController extends Controller
{

    public function __construct(Response $response){
        $this->response = $response;
    }

    public function siswa(Request $request){
        if(isset($request->mapel_id) && !isset($request->kelas_id)){
            $mapel = Mapel::find($request->mapel_id);
            $ret = view('ajax.list_kelas')->with('kelas', $mapel->kelas->pluck('nama', 'id')->toArray())->render();
            return response()->json($ret);
        }else if(isset($request->kelas_id)){
            $kelas = Kelas::find($request->kelas_id);
            $siswa = $kelas->siswa;
            $ret = view('ajax.list_siswa', ['data' => $siswa])->render();
            return response()->json($ret);
        }
    }
}
