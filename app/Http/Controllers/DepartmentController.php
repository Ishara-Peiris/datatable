<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use Illuminate\Support\Facades\Validator;



class DepartmentController extends Controller
{
    public function index(){
        return view('/department/form');

    }

    public function getDetails()
    {

        $dept = department::all();
        return view('department.table',compact('dept'));
    }

    public function store(Request $request)
    {
        // Define validation rules and custom messages
        $rules = [
            'd_code' => 'required|string|max:10', // Limit code to 10 characters
            'd_name' => 'required|string|max:255',
            'status' => 'required|in:1,2', // Validate status for 'Active' or 'Inactive'
        ];

        $customMessages = [
            'd_code.required' => 'The department code is required.',
            'd_code.max' => 'The department code cannot exceed 10 characters.',
            'd_name.required' => 'The department name is required.',
            'd_name.max' => 'The department name cannot exceed 255 characters.',
            'status.required' => 'Please select a status for the department.',
            'status.in' => 'The selected status is invalid. Choose Active or Inactive.',
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save the department data
        $dept = new Department();
        $dept->d_code = $request->d_code;
        $dept->d_name = $request->d_name;
        $dept->status = $request->status;
        $dept->save();

        return redirect()->route('department.table')->with('success', 'Department added successfully.');
    }





public function update($id){
    $dept=department::where('id',$id)->first();

    return view('department.edit', compact('dept'));

}

public function edit(request $request ,$id){
    $rules = [
        'd_code' => 'required|string|max:10', // Limit code to 10 characters
        'd_name' => 'required|string|max:255',
        'status' => 'required|in:1,2', // Validate status for 'Active' or 'Inactive'
    ];

    $customMessages = [
        'd_code.required' => 'The department code is required.',
        'd_code.max' => 'The department code cannot exceed 10 characters.',
        'd_name.required' => 'The department name is required.',
        'd_name.max' => 'The department name cannot exceed 255 characters.',
        'status.required' => 'Please select a status for the department.',
        'status.in' => 'The selected status is invalid. Choose Active or Inactive.',
    ];

    // Perform validation
    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    //finf id
    $dept =department::where('id',$id)->first();


//save  updated data
    $dept->d_code = $request->d_code;
    $dept->d_name = $request->d_name;
    $dept->status = $request->status;

    $dept->save();
    //redirect
return redirect()-> route('department.table');

}

   public function delete($id)
   {
       // Find  ID
       $dept = department::findOrFail($id);

       $dept->delete();

       // Redirect
       return redirect()->route('department.table')->with('success', 'Department deleted successfully.');
   }


   public function index4(){
    return view('/layouts/admin');

}



}
