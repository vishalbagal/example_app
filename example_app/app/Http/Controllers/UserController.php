<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Mail\YourMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function saveregister(Request $request)
    {
        // return $request->input();
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // dd($user);
        $data = [
            'name'=>$request->name,
        ];
        // dd($data);

        if($user){
            Mail::to('vishal.bagal@gophygital.io')->send(new YourMailable($data));
            return "Email sent";
            // return redirect('/')->with("success","Registration successfull!!!");
        }
        else{
            return redirect('/register')->with("error","Fail to create account...Please try Again!!!");
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticateLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = DB::table('users')
            ->where('email', '=', $request->email)
            ->where('password', '!=', NULL)
            ->first();

        if($user)
        {
            // echo "bye";die;
            if(Hash::check($request->password, $user->password))
            {
                if($user->role_id ==2 )
                {
                    $request->session()->put('loggeduser',$user->id);
                    $request->session()->put('LoggedUserName',$user->name);
                    $request->session()->put('loggedUserType',$user->role_id);
                    $request->session()->put('LoggedUserEmail',$user->email);

                    $credentials = $request->only('email','password');
                    if(Auth::attempt($credentials)){
                        // return redirect()->intended(route('home'));
                        // $data = DB::table('products')->orderBy('id','asc')->get();
                        return redirect('/clientData');
                    }
                    else{
                        return redirect('/');
                    }
                }
                else
                {
                    $request->session()->put('loggeduser',$user->id);
                    $request->session()->put('LoggedUserName',$user->name);
                    $request->session()->put('loggedUserType',$user->role_id);
                    $request->session()->put('LoggedUserEmail',$user->email);

                    $credentials = $request->only('email','password');
                    if(Auth::attempt($credentials)){
                        // return redirect()->intended(route('home'));
                        // $data = DB::table('products')->orderBy('id','asc')->get();
                        return redirect('/products');
                    }
                    else{
                        return redirect('/');
                    }
                }
            }
            else{
                return redirect('/');
            }
        }
        else
        {
            // echo "hello";die;
            return view('auth.register')->with('error','You are not a Valid User!!!');
        }
    }


    public function loginsave(Request $request)
    {
        return view('products.list');
    }

    public function userProfile(Request $request)
    {
        $userData = DB::table('users')->where('id','=',session('loggeduser'))->first();
        return view('auth.profile',['userData'=>$userData]);
    }

    public function logout(Request $request)
    {
        if(session()->has('loggeduser'))
        {
            session()->pull('loggeduser');
            return redirect('/');
        }
    }

}
