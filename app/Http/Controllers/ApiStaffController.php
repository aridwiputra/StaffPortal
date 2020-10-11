<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class ApiStaffController extends Controller
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

	public function store(Request $request)
	{
		$validation = Validator::make($request->all(),[ 
			'email'    => ['required', 'string', 'email', 'max:255', 'unique:staff'],
			'phone'    => ['required', 'string', 'max:255'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'position' => ['required', 'string', 'max:255'],
    	]);
        if ($validation->fails())
        {
        	return response()->json($validation->errors());
   		}else
   		{
	        $staff           = new Staff;
	        $staff->email    = $request->email;
	        $staff->phone    = $request->phone;
	        $staff->password = Hash::make($request->password);
	        $staff->position = $request->position;
	        $staff->save();

		    if($staff->save()){
		        $res['message'] = "Success!";
		        $res['value'] = $staff;
		        return response($res);
		    }else{
		    	$res['message'] = "Failed!";
	            return response($res);
		    }
	    }
	}
}
