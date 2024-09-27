<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);

        if($user->id){
            $result = array('status'=>true,'message'=>'User Created','data'=>$user);
            $responseCode = 200;
        }
        else{
            $result = array('status'=>false,'message'=>'Spmething went wrong');
            $responseCode = 400;
        }

        return response()->json($result,$responseCode);
    }
}
