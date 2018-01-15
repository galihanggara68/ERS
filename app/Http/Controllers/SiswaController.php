<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Jurusan;
use Validator, Session, Sentinel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $cred = [
            'email' => 'galih@mail.com',
            'password' => 'admin123'
        ];
        Sentinel::authenticate($cred);
    }

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
        return view('forms.siswa-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), Siswa::valid());
        if($valid->fails()){
            $request->session()->flash('error', 'Gagal Membuat Data Siswa');
            return back()
            ->withErrors($valid)
            ->withInput();
        }
        Siswa::create($request->all());
        $request->session()->flash('success', 'Sukses Membuat Data Siswa');
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
        $siswa = Siswa::find($id);
        return view('mainview.siswa-tab', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all()->pluck('nama', 'id')->toArray();
        $jurusan = Jurusan::all()->pluck('nama', 'id')->toArray();
        return view('forms.siswa-form', [
            'siswa' => $siswa, 
            'kelas' => $kelas, 
            'jurusan' => $jurusan
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
        $valid = Validator::make($request->all(), Siswa::valid());
        if($valid->fails()){
            $request->session()->flash('error', 'Gagal Mengupdate Data Siswa');
            return back()
            ->withErrors($valid)
            ->withInput();
        }
        Siswa::find($id)->update($request->all());
        $request->session()->flash('success', 'Sukses Mengupdate Data Siswa');
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
        Siswa::destroy($id);
        $request->session()->flash('success', 'Sukses Menghapus Data Siswa');
        return redirect('/dashboard');
    }
}
