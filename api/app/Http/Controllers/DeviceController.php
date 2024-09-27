<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;

class DeviceController extends Controller
{
    function list($id=null)
    {
        return $id?User::find($id):User::all();
    }

    function add(Request $request)
    {
        $data = Device::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'password'=> bcrypt($request->password),
        ]);
        $result = array('status'=>false,'message'=>'Data has saved succesfully!!!','data'=>$data);
        return response()->json($result,200);
    }

}
