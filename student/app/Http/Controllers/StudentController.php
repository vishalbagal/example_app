<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    function index(Request $request){
        $student_data = Student::all();
        return view('student_list',['student_data'=>$student_data]);
    }

    function create(Request $request){
        return view('add_student_form');
    }

    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'standard'=>'required',
            'address'=>'required'
        ]);
        $obj = new Student;
        $obj->name = $request->name;
        $obj->age =$request->age;
        $obj->standard = $request->standard;
        $obj->address = $request->address;

        $obj->save();

        return redirect('/');
    }

    function edit($id){
        $edit_data = Student::find($id);
        return view('edit_student_form',['edit_data'=>$edit_data]);
    }

    function update(Request $request){
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'standard'=>'required',
            'address'=>'required'
        ]);
        $data = Student::find($request->id);

        $data->name = $request->name;
        $data->age = $request->age;
        $data->standard = $request->standard;
        $data->address = $request->address;

        $data->update();
        return redirect('/')->with('success','Data Updated Successfully');
    }

    function delete(Request $request){
        Student::find($request->id)->delete();
        return redirect('/')->with('success','Data Deleted Successfully');

    }
}
