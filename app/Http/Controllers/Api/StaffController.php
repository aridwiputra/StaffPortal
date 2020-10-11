<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;


class StaffController extends Controller
{
    public function show($id)
    {
        $data = Staff::where('staffId',$id)->get();

        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['values']  = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
