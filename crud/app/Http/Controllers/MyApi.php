<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyApi extends Controller
{
    function ApiData(){
        return ["name"=>"kiran","address"=>"pune"];
    }
}
