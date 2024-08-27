<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
class DesignationController extends Controller
{
    public function show()
    {
        $departments = Department::get();
        return view('Employees.designation.designation',compact('departments'));
    }
    public function store(Request $request)
    {
        $desig = new Designation();
        $desig->name = $request->designationName;
        $desig->dept_id = $request->dept_id;
        $desig->description = $request->description;
        $desig->save();
        $designations = Designation::get();
        return view('Employees.designation.designationTable',compact('designations'));
    }
    public function fetch($id)
    {
        $designation = Designation::find($id);
        $departments = Department::get();
        return view('Employees.designation.designationUpdate',compact('designation','departments'));
    }
    public function update(Request $request,$id)
    {
        $desig = Designation::find($id);
        $desig->name = $request->designationName;
        $desig->dept_id = $request->dept_id;
        $desig->description = $request->description;
        $desig->update();
        $designations = Designation::get();
        return view('Employees.designation.designationTable',compact('designations'));
    }
    public function delete($id)
    {
        $desig = Designation::find($id);
        $desig->delete();
        $designations = Designation::get();
        return view('Employees.designation.designationTable',compact('designations'));
    }
    public function index()
    {
        $designations = Designation::get();
        return view('Employees.designation.designationTable',compact('designations'));
    }
}
