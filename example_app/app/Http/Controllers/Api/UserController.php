<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;

class UserController extends Controller
{

    /* public function createuser(Request $request)
    {
        // $request

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=> bcrypt($request->password),
        ]);

        if($user->id){
            $result = array('status'=>true,'message'=>'User Created','data'=>$user);
            $responseCode = 200;
        }
        else{
            $result = array('status'=>false,'message'=>'Something went wrong');
            $responseCode = 400;
        }

        return response()->json($result,$responseCode);
    }
 */


public $successStatus = 200;

/* public function login(){
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        return response()->json(['success' => $success], $this-> successStatus);
    }
    else{
        return response()->json(['error'=>'Unauthorised'], 401);
    }
} */
public function login(){
    $email = request('email');
    $password = request('password');

    $user = User::where('email',$email)->first();
    if(!$user)
    {
        return response()->json(["error"=>"Email is invalid!!!"]);
    }
    if(!Hash::check($password, $user->password)){
        return response()->json(["error"=>"Password not matches!!!"]);
    }

    $success['token'] =  $user->createToken('MyApp')-> accessToken;
    return response()->json(['success' => $success], $this-> successStatus);
}

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
    ]);

    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);
    }
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $success['token'] =  $user->createToken('MyApp')-> accessToken;
    $success['name'] =  $user->name;
    return response()->json(['success'=>$success], $this-> successStatus);
}

public function details()
{

    $user = Auth::user();
    return response()->json(['success' => $user], $this-> successStatus);
}


/*
public $successStatus = 200;

public function login() {
    $email = request('email');
    $password = request('password');

    $user = User::where('email', $email)->first();

    if (!$user) {
        return response()->json(['error' => 'Email does not exist'], 401);
    }

    if (!Hash::check($password, $user->password)) {
        return response()->json(['error' => 'Incorrect password'], 401);
    }

    $success['token'] = $user->createToken('MyApp')->accessToken;
    return response()->json(['success' => $success], $this->successStatus);
}
 */


}
