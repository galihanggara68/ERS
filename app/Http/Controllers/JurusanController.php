<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan, Validator, Session;

class JurusanController extends Controller
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
        return view('forms.jurusan-form');
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
        Jurusan::create($request->all());
        Session::flash('success', 'Sukses Membuat Jurusan');
        return redirect('/dashboard/jurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('forms.jurusan-form', compact('jurusan'));
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
        Jurusan::find($id)->update($request->all());
        Session::flash('success', 'Sukses Mengupdate Jurusan');
        return redirect('/dashboard/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::destroy($id);
        Session::flash('success', 'Sukses Menghapus Jurusan');
        return redirect('/dashboard/jurusan');
    }
}
