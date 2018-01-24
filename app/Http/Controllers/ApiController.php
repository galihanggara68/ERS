<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Mapel, App\Kelas, App\Siswa;
use App\Transformers\MapelTransformer, App\Transformers\KelasTransformer;

class ApiController extends Controller
{

    public function __construct(Response $response){
        $this->response = $response;
    }

    public function siswa(Request $request){
        if(isset($request->mapel_id) && !isset($request->kelas_id)){
            $mapel = Mapel::with('kelas')->find($request->mapel_id);
            //return $this->response->withItem($mapel, new MapelTransformer);
            $ret = view('ajax.list_kelas')->with('kelas', $mapel->kelas)->render();
            return response()->json($ret);
        }else if(isset($request->kelas_id)){
            $kelas = Kelas::with('siswa')->find($request->kelas_id);
            return $this->response->withItem($kelas, new KelasTransformer);
        }
    }
}
