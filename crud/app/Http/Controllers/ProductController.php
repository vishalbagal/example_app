<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'equired|numeric'
        ];
        $validator = validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
