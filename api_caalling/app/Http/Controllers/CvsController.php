<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request){

        $data = DB::table('products')->orderBy('id','asc')->get();
        // echo "<pre>";
        // print_r($data);exit;
        return view('products.list',['data'=>$data]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // Validate input data
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);


        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->name . '.' . $ext;

            // Save image to the products folder
            $image->move(public_path('uploads/products'), $imageName);
        }
        else
        {
            $imageName = null; // Set imageName to null if no image is uploaded
        }

        // Insert product data into the database
        $data = DB::table('products')->insert([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'description' => $request->desc,
            'image' => $imageName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Check if the data was inserted successfully
        if ($data) {
            return redirect()->route('products.index')->with('success', 'Product Added Successfully!!!');
        } else {
            return redirect()->route('products.create')->with('error', 'Unable to Add Product!!!');
        }
    }
    public function edit($id){
        $productData = DB::table('products')->where('id','=',$id)->first();
        // echo "<pre>";
        // print_r($product);exit;
        return view('products.edit',['productData'=>$productData]);
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $product = DB::table('products')->where('id', '=', $id)->first();
        if ($request->hasFile('image'))
        {
            //delete old image
            if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
                File::delete(public_path('uploads/products/' . $product->image));
            }

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->name . '.' . $ext;

            // Save image to the products folder
            $image->move(public_path('uploads/products'), $imageName);
        }
        else
        {
            $imageName = $product->image;
        }

        // Update product data into the database
        $data = DB::table('products')->where('id','=',$id)->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'description' => $request->desc,
            'image' => $imageName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Check if the data was updated successfully
        if ($data) {
            return redirect()->route('products.index')->with('success', 'Product Updated Successfully!!!');
        }
    }

    public function delete($id){
        $productData = DB::table('products')->where('id','=',$id)->first();

        //delete image if product delete
        File::delete(public_path('uploads/products/' . $productData->image));

        //delete product from database
        DB::table('products')->where('id',$id)->delete();

        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully!!!');
    }
}
