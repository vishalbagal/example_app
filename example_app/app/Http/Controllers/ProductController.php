<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Yajra\DataTables\Facades\Datatables;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\DataTables;
class ProductController extends Controller
{
    // public function index(Request $request){

    //     $data = DB::table('products')->orderBy('id','asc')->get();
    //     return view('products.list',['data'=>$data]);

    // }

    public function index(Request $request){

        if ($request->ajax()) {
            $data = DB::table('products')
            ->join('tbl_industry', 'products.industry_id', '=', 'tbl_industry.industry_id')
            ->leftjoin('tbl_sub_industry', 'products.sub_industry_id', '=', 'tbl_sub_industry.sub_industry_id')
            ->select('products.*','tbl_industry.industry_name','tbl_sub_industry.sub_industry_name');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('industry_id',function($data){
                    $industry_name = $data->industry_name;
                    return $industry_name;
                })
                ->addColumn('sub_industry_id',function($data){
                    $sub_industry_name = $data->sub_industry_name;
                    return $sub_industry_name;
                })
                ->addColumn('image', function ($data) { return '<img src="/uploads/products/'.$data->image.'?i='.microtime().'" border="0" width="100" height="100" class="img-rounded" align="center" />';})
                // ->rawColumns(['image'])
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="">edit</a>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($data) { return '<img src="/uploads/products/'.$data->image.'?i='.microtime().'" border="0" width="100" height="100" class="img-rounded" align="center" />';})
                ->rawColumns(['action','image'])
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.list');

    }

    public function create(){
        $cv_data = DB::connection('secondary')->table('tbl_cvs')->where('is_active', '=', 0)->get();
        $industry_data = DB::connection('secondary')->table('tbl_industry')->where('is_active', '=', 0)->get();
        $sub_industry_data =  DB::connection('secondary')->table('tbl_sub_industry')->where('is_active', '=', 0)->get();
        return view('products.create',['cv_data'=>$cv_data,'industry_data'=>$industry_data,'sub_industry_data'=>$sub_industry_data]);
    }

    public function store(Request $request){
        $request->validate([
            'cv_name' => 'required',
            'industry_name' => 'required',
            'cv_logo' => 'nullable|image',
        ]);


        if ($request->hasFile('cv_logo'))
        {
            $image = $request->file('cv_logo');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->cv_name . '.' . $ext;

            $image->move(public_path('uploads/products'), $imageName);
        }
        else
        {
            $imageName = null;
        }

        $data = DB::table('products')->insert([
            'name' => $request->cv_name,
            'industry_id' => $request->industry_name,
            'sub_industry_id' => $request->sub_industry_name,
            'image' => $imageName,
        ]);

        if ($data) {
            return redirect()->route('products.index')->with('success', 'Product Added Successfully!!!');
        } else {
            return redirect()->route('products.create')->with('error', 'Unable to Add Product!!!');
        }
    }
    public function edit($id){
        $productData = DB::table('products')->where('id','=',$id)->first();
        return view('products.edit',['productData'=>$productData]);
    }

    public function clientData()
    {
        $clientData = DB::table('users')->where('id','=',session('loggeduser'))->first();
        return view('auth.userProfile',['clientData'=>$clientData]);
    }


    /* public function disable($id)
    {
        $updateCv = DB::table('products')->where('id','=',$id)->update(['is_active'=>'1','edited_by'=>session('loggeduser')]);
        $data =  DB::table('products')->where('is_active','=','0');
        if($data)
        {
            if($updateCv){
                return back()->with('success','product disabled successfully!!!');

            }
            else{
                return back()->with('error','something went wrong, please try again!!!');
            }
        }
        else{
            return back()->with('error','something went wrong, please try again!!!');
        }
    } */

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
            if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
                File::delete(public_path('uploads/products/' . $product->image));
            }

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->name . '.' . $ext;

            $image->move(public_path('uploads/products'), $imageName);
        }
        else
        {
            $imageName = $product->image;
        }

        $data = DB::table('products')->where('id','=',$id)->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'description' => $request->desc,
            'image' => $imageName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($data) {
            return redirect()->route('products.index')->with('success', 'Product Updated Successfully!!!');
        }
    }

    public function delete($id){
        $productData = DB::table('products')->where('id','=',$id)->first();

        File::delete(public_path('uploads/products/' . $productData->image));

        DB::table('products')->where('id',$id)->delete();

        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully!!!');
    }
}
