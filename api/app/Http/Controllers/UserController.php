<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'string',
        ]);
        if($validator->fails())
        {
            $result = array('status' => false, 'message' => 'Validation fails!!!','error_message'=>$validator->errors());
            return response()->json($result, 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        if ($user->id) {
            $result = array('status' => true, 'message' => 'User Created', 'data' => $user);
            $responseCode = 200;
        } else {
            $result = array('status' => false, 'message' => 'Something went wrong');
            $responseCode = 400;
        }

        return response()->json($result, $responseCode);
    }

    public function getUser(Request $request)
    {
        // $res = array('name' => 'vishal');
        // return response()->json($res);

        return['name' => 'vishal'];
    }



}
