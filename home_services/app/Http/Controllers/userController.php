<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function register(){
        $data = DB::table('user_roles')->get();
        return view('auth.register',['data'=>$data]);
    }

    public function registerPost(Request $request){
        // return $request->input();
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        if($request->sel_role == 2)
        {
            $user = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->sel_role,
            ]);
        }
        else{
            $user = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->sel_role,
            ]);
        }


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
        // return $request->input();
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        // $credentials = $request->only('email','password');

        $user = DB::table('users')
            ->where('email', '=', $request->email)
            ->where('password', '!=', NULL)
            ->first();
        // echo "<pre>";
        // print_r($user);exit;
        if($user){
            if(Hash::check($request->password, $user->password)){

                if($user->role_id == 1){

                    $request->session()->put('LoggedUser', $user->id);
                    $request->session()->put('LoggedUserType', $user->role_id);
                    $request->session()->put('LoggedUserName', $user->name);
                    $request->session()->put('LoggedUserEmail', $user->email);

                    if(session('LoggedUserType') == 1){
                        $credentials = $request->only('email','password');
                        if(Auth::attempt($credentials)){
                            return redirect()->intended(route('home'));
                        }
                        else{
                            return redirect()->route('/')->with('error','login fail!!!');
                        }
                    }
                    else{
                        return redirect()->route('/')->with('error','login fail!!!');
                    }
                }
                else{
                    $request->session()->put('LoggedUser', $user->id);
                    $request->session()->put('LoggedUserType', $user->role_id);
                    $request->session()->put('LoggedUserName', $user->name);
                    $request->session()->put('LoggedUserEmail', $user->email);

                    if(session('LoggedUserType') == 1){
                        $credentials = $request->only('email','password');
                        if(Auth::attempt($credentials)){
                            return redirect()->intended(route('home'));
                        }
                        else{
                            return redirect()->route('/')->with('error','login fail!!!');
                        }
                    }
                }


            }
        }
        else{
            $credentials = $request->only('email','password');
                        if(Auth::attempt($credentials)){
                            return redirect()->intended(route('home'));
                        }
                        else{
                            return redirect()->route('/')->with('error','login fail!!!');
                        }
        }
        // return redirect()->route('login')->with('error','login fail!!!');
       /*  if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with('error','login fail!!!'); */

        /* if(Auth::attempt(['email' => $email, 'password' => $password])){

        } */

        /* $loginData = DB::table('users')->where('email','=',$request->email)->first();
        // print_r($loginData);exit;
        if($loginData){

        } */
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            session()->pull('LoggedUserType');
            return redirect('/');
            //return route('login');
        }
        echo "ohh!!!";
    }

}
