<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

// use DataTables;

class EmployeeController extends Controller
{

    /* public function data()
    {
        $data = DB::table('employees')->get();

        return DataTables::of($data)->make(true);

    } */

    /* public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                  $actionBtn = '<a href="javascript:void(0)"
                  class="edit btn btn-success btn-sm">Edit</a>
                  <a href="javascript:void(0)"
                  class="delete btn btn-danger btn-sm">Delete
                  </a>';
                  return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('employee_list');
    } */


    function index(){
        $employee_data = DB::table('employees')->get();
        return view('employee_list',['employee_data'=>$employee_data]);
    }

    function create(){
        return view('add_employee_form');
    }

    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'department'=>'required',
            'address'=>'required'
        ]);
        DB::table('employees')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'address' => $request->address,
        ]);
        return redirect('/')->with('success',' Employee Added Successfully');
    }

    function edit($id){
        $edit_data = DB::table('employees')->find($id);
        return view('edit_employee_form',['edit_data'=>$edit_data]);
    }



function update(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'department' => 'required',
        'address' => 'required'
    ]);

    DB::table('employees')->where('id',$request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'department' => $request->department,
        'address' => $request->address,
    ]);

    return redirect('/')->with('success', 'Employee Updated Successfully');
}

    function delete($id){
        DB::table('employees')->where('id',$id)->delete();
        return redirect('/')->with('success','Data Deleted Successfully');

    }


/*     function index(){
        // $collection = collect([1,2,3,4,56,67,7,8]);
        // $result = $collection->transform(function($value){

        // });
        // dd($result->all());


        //
        $data = collect([
            1 => ['order' => 3],
            2 => ['order' => 2],
            3 => ['order' => 1]
        ]);

        $ids = $data->mapWithKeys(function ($item, $key) {
            return [$key => ['order' => rand(1, 10)]];
        });

        print_r($ids->all());
    } */
}
