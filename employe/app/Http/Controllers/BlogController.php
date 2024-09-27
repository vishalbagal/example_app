<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
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
