<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest, App\Http\Requests\SessionRequest;
use Sentinel, Session, App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(){
        if($user = Sentinel::check()){
            Session::flash('notice', 'Anda telah login '.$user->email);
            return redirect('/dashboard');
        }else{
            return view('forms.login');
        }
    }

    public function login_store(SessionRequest $request){
        if($user = Sentinel::authenticate($request->all())){
            Session::flash('notice', 'Selamat datang '. $user->email);
            return redirect()->intended('/dashboard');
        }else{
            Session::flash('error', 'Login Gagal');
            return view('forms.login');
        }
    }

    public function logout(){
        Sentinel::logout();
        Session::flash('notice', 'Logout Success');
        return redirect('/');
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
        return view('forms.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Sentinel::registerAndActivate($request->all());
        Session::flash('success', 'Suskses Mebuat User');
        return redirect('/dashboard/user');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('success', 'Sukses Menghapus User');
        return redirect()->back();
    }
}
