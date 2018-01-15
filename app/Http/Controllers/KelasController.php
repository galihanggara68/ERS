<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas, Validator, Session;


class KelasController extends Controller
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
        return view('forms.kelas-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($valid->fails()) return back()
        ->withErrors($valid)
        ->withInput();
        Kelas::create($request->all());
        Session::flash('success', 'Sukses Membuat Kelas');
        return redirect('/dashboard/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        return view('mainview.kelas-tab', ['kelas' => $kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('forms.kelas-form', compact('kelas'));
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
        $valid = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($valid->fails()) return back()
        ->withErrors($valid)
        ->withInput();
        Kelas::find($id)->update($request->all());
        Session::flash('success', 'Sukses Mengupdate Kelas');
        return redirect('/dashboard/kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        Session::flash('success', 'Sukses Menghapus Kelas');
        return redirect('/dashboard/kelas');
    }
}
