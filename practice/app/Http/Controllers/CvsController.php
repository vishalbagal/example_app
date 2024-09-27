<?php

/* namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;

use Illuminate\Http\Request; */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DataTables;
use Illuminate\Support\Facades\DB;


class CvsController extends Controller
{
    function addCv(){
        $industry_data = DB::table('tbl_industry')->where('is_active','=',0)->get();
        $sub_industry_data =  DB::table('tbl_sub_industry')->where('is_active', '=', 0)->get();
        $brand_data = DB::table('tbl_brands')->where('is_active','=',0)->get();
        // echo "<pre>";
        // print_r($brand_data);exit;
        return view('add_brand',['brand_data'=>$brand_data,'industry_data'=>$industry_data,'sub_industry_data'=>$sub_industry_data]);
    }

    function saveBrandCv(Request $request)
    {
        // return $request->input();
        $request->validate([
            'cv_name'=>'required',
            'industry_name'=>'required'
        ]);
        $block_1_data =[
            'cv_name' => $request->cv_name,
            'industry_id' => $request->industry_name,
            'sub_industry_id' => $request->sub_industry_name,
            'cv_date' => $request->cv_date,
        ];
        $id = DB::table('new')->insertGetId($block_1_data);
        // echo $id;die;
        if ($id == 0 || $id == '')
        {
            $error_data = "Something went wrong while inserting block 1 data";
            ErrorMailSender::sendErrorMail($error_data);
            return back()->with('fail', 'Something went wrong while inserting cv data, please try again!');
        }
        else
        {
            if($request->cv_logo != '')
            {
                $img_name = $request->cv_logo;
               DB::table('new')->where('id', $id)->update(['cv_logo' => $img_name]);
            }
            return redirect('brandcvs')->with('success','Brand Sonic Radar data inserted successfully');
        }
    }

    function getbrandlist()
    {
        return view('brand_cv_list');
    }

    function getbranddata(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('new')
            ->join('tbl_industry', 'new.industry_id', '=', 'tbl_industry.industry_id')
            ->leftjoin('tbl_sub_industry', 'new.sub_industry_id', '=', 'tbl_sub_industry.sub_industry_id')
            ->select('new.*','tbl_industry.industry_name','tbl_sub_industry.sub_industry_name');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('industry', function($data){
                        $industry_name = $data->industry_name;
                        return $industry_name;
                    })
                    ->addColumn('sub_industry', function($data){
                        $sub_industry_name = $data->sub_industry_name;
                        return $sub_industry_name;
                    })
                    ->addColumn('action',function($row){
                        $actionBtn = '<a href="edit-cv/'.base64_encode($row->id).'" title="Click here to edit" class="edit btn btn-success btn-sm">Edit</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    function editCv($id)
    {
        $id = base64_decode($id);
        $brand_data = DB::table('new')->where('id','=',$id)->first();
        $industry_data = DB::table('tbl_industry')->where('is_active','=',0)->get();
        $sub_industry_data =  DB::table('tbl_sub_industry')->where('is_active', '=', 0)->get();
        // echo "<pre>";
        // print_r($brand_data);exit;
        return view('edit_cv',['brand_data'=>$brand_data,'industry_data'=>$industry_data,'sub_industry_data'=>$sub_industry_data]);
    }
}
