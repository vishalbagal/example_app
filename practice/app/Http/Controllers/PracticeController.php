<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
{
    public function add(){
        $cv_data = DB::table('tbl_cvs')->where('is_active','=',0)->get();
        return view('addEmployee',['cv_data'=>$cv_data]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('employees')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('welcome');
    }

}
