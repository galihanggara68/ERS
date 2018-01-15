<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru, App\Kelas, App\Jurusan, App\Mapel;
use Session, Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = new Guru;
        $kelas = Kelas::all()->pluck('nama', 'id')->toArray();
        array_unshift($kelas, "--Bukan Wali Kelas--");
        $jurusan = Jurusan::all()->pluck('nama', 'id')->toArray();
        array_unshift($jurusan, "--Bukan Kaprog--");
        $mapel = Mapel::all()->pluck('nama', 'id')->toArray();
        return view('forms.guru-form', [
            'guru' => $guru, 
            'kelas' => $kelas, 
            'jurusan' => $jurusan,
            'mapel' => $mapel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), Guru::valid());
        if($valid->fails()){
            $request->session()->flash('error', 'Gagal Membuat Data Guru');
            return back()
            ->withErrors($valid)
            ->withInput();
        }
        
        $guru = Guru::create($request->all());
        for($i = 0; $i < count($request->kelas_id); $i++)
            $guru->mengajar()->attach($request->kelas_id[$i], ['mapel_id' => $request->mapel_id[$i]]);
        Kelas::find($request->wali)->update(['guru_id' => $guru->id]);
        Jurusan::find($request->kaprog)->update(['guru_id' => $guru->id]);
        $request->session()->flash('success', 'Sukses Membuat Data Guru');
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return view('mainview.guru-tab', ['guru' => $guru]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $guru = Guru::find($id);
        $kelas = Kelas::all()->pluck('nama', 'id')->toArray();
        array_unshift($kelas, "--Bukan Wali Kelas--");
        $jurusan = Jurusan::all()->pluck('nama', 'id')->toArray();
        array_unshift($jurusan, "--Bukan Kaprog--");
        $mapel = Mapel::all()->pluck('nama', 'id')->toArray();
        return view('forms.guru-form', [
            'guru' => $guru, 
            'kelas' => $kelas, 
            'jurusan' => $jurusan,
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $valid = Validator::make($request->all(), Guru::valid());
        if($valid->fails()){
            $request->session()->flash('error', 'Gagal Mengupdate Data Guru');
            return back()
            ->withErrors($valid)
            ->withInput();
        }
        $guru = Guru::find($id);
        $guru->update($request->all());
        $guru->mengajar()->sync($request->kelas_id);
        Kelas::find($request->wali)->update(['guru_id' => $guru->id]);
        Jurusan::find($request->kaprog)->update(['guru_id' => $guru->id]);
        $request->session()->flash('success', 'Sukses Mengupdate Data Guru');
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Guru::destroy($id);
        $request->session()->flash('success', 'Sukses Menghapus Data Guru');
        return redirect('/dashboard');
    }
}
