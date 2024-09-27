<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            return redirect('/login')->with("success","Registration successfull!!!");
        }
        else{
            return redirect('/register')->with("error","Fail to create account...Please try Again!!!");
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with('error','login fail!!!');

        /* if(Auth::attempt(['email' => $email, 'password' => $password])){

        } */

        /* $loginData = DB::table('users')->where('email','=',$request->email)->first();
        // print_r($loginData);exit;
        if($loginData){

        } */
    }

}
