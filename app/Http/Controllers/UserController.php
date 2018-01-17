<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest, App\Http\Requests\SessionRequest, App\Http\Requests\ReminderRequest;
use Sentinel, Session, App\User, Reminder, Event, App\Events\ReminderEvent;

class UserController extends Controller
{
    // Login And Logout User
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

    // Password Reminder

    public function forgot_create(){
        return view('forms.reminder');
    }

    public function forgot_store(Request $request){
        $user = User::where('email', $request->email)->first();

        if($user){
            $getUser = Sentinel::findById($user->id);
            ($reminder = Reminder::exists($getUser)) || ($reminder = Reminder::create($getUser));
            Event::fire(new ReminderEvent($getUser, $reminder));
            Session::flash('notice', 'Silahkan ikuti instruksi pada pesan yang kami kirim di email');
        }else{
            Session::flash('error', 'Email tidak valid');
        }
        return view('forms.reminder');
    }

    public function forgot_edit($id, $code){
        $user = Sentinel::findById($id);
        if(Reminder::exists($user, $code)){
            return view('forms.reminder-reset', ['id' => $id, 'code' => $code]);
        }else{
            return redirect('/');
        }
    }

    public function forgot_update(ReminderRequest $request, $id, $code){
        $user = Sentinel::findById($id);
        $reminder = Reminder::exists($user, $code);

        if($reminder){
            Reminder::complete($user, $code, $request->password);
            Session::flash('notice', 'Password sukses diatur ulang');
            return redirect('login');
        }else{
            Session::flash('error', 'Password harus sama');
            return back();
        }
    }


    /**
     * User Resources
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
        $user = Sentinel::findById($id);
        return view('mainview.user-tab', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Sentinel::findById($id);
        return view('forms.register', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequest $request, $id)
    {
        $user = Sentinel::findById($id);
        $user = Sentinel::update($user, $request->all());
        Session::flash('success', 'Suskses Mengupdate User');
        return redirect('/dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sentinel::findById($id);
        $user->delete();
        Session::flash('success', 'Sukses Menghapus User');
        return redirect()->back();
    }
}
