<?php

namespace App\Http\Controllers;
use App\Mail\YourMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup()
    {
        return view('layouts.register');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = DB::table('pc')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        if($user)
        {
            Mail::to('vishal.bagal@gophygital.io')->send(new YourMailable($user));
            return redirect('/login');
        }
        else{
            return redirect('/register');
        }

    }

    public function login(Request $request)
    {
        return view('layouts.login');
    }

    public function saveLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password' => 'required'

        ]);

        $user = DB::table('pc')->where('email','=',$request->email);
        if($user)
        {
            return redirect('/dashboard');
        }
        else{
            return redirect('/login');
        }
    }

    public function dashboard()
    {
        return view('layouts.dashboard');
    }
}
