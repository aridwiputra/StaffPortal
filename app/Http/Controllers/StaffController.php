<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['staff'] = Staff::all();
        return view('backend.staff.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:staff'],
            'phone'    => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $staff           = new Staff;
        $staff->email    = $request->email;
        $staff->phone    = $request->phone;
        $staff->password = Hash::make($request->password);
        $staff->position = $request->position;
        $staff->save();

        return redirect('/')->with('status', __('Data staff has been created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['staff'] = Staff::findOrFail($id);

        return view('backend.staff.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:staff,email,'.$id.',staffId'],
            'phone'    => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $staff           = Staff::findOrFail($id);
        $staff->email    = $request->email;
        $staff->phone    = $request->phone;
        $staff->password = Hash::make($request->password);
        $staff->position = $request->position;
        $staff->save();

        return redirect('/')->with('status', __('Data staff has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $staff = Staff::findOrFail($request->staffId);
        $staff->delete();
        return redirect('/')->with('status', __('Data staff has been deleted'));
    }
}
