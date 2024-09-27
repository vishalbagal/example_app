<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;
use DataTables;
use Illuminate\Support\Facades\DB;



class TestTableController extends Controller
{
    public function index()
    {
        return view('testtable');
    }


    public function getTestTable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('new')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    }

