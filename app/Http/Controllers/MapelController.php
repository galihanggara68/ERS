<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel, Validator, Session;

class MapelController extends Controller
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
        return view('forms.mapel-form');
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
        Mapel::create($request->all());
        Session::flash('success', 'Sukses Membuat Mapel');
        return redirect('/dashboard/mapel');
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
        $mapel = Mapel::find($id);
        return view('forms.mapel-form', compact('mapel'));
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
        Mapel::find($id)->update($request->all());
        Session::flash('success', 'Sukses Mengupdate Mapel');
        return redirect('/dashboard/mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::destroy($id);
        Session::flash('success', 'Sukses Menghapus Mapel');
        return redirect('/dashboard/mapel');
    }
}
