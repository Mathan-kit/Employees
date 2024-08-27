<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {
        $departments = Department::get();
        return view('Employees.employee.employees',compact('departments'));
    }
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->date_of_birth = $request->dob;
        $employee->address = $request->address;
        $employee->phone = $request->mobile;
        $employee->email = $request->email;
        $employee->dept_id = $request->dept_id;
        $employee->designation_id = $request->designation_id;
        if($request->file('image'))
        {
            $img = $request->file('image');
            $filename = uniqid().'.'.$img->getClientOriginalExtension();
            $path = $img->storeAs('public/storage/image',$filename);
            $employee->image=$path;
        }
        $employee->date_of_joining = $request->date_of_joining;
        $employee->save();
        $employees = Employee::get();
        return view('Employees.employee.employeeTable',compact('employees'));
    }
    public function fetch($id)
    {
        $employee = Employee::find($id);
        $department = Department::get();
        $designation = Designation::get();
        return view('Employees.employee.employeeUpdate',compact('designation','department','employee'));
    }
    public function update(Request $request,$id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->date_of_birth = $request->dob;
        $employee->address = $request->address;
        $employee->phone = $request->mobile;
        $employee->email = $request->email;
        $employee->dept_id = $request->dept_id;
        $employee->designation_id = $request->designation_id;
        $employee->image = $request->image;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->update();
        $employees = Employee::get();
        return view('Employees.employee.employeeTable',compact('employees'));
    }
    public function delete($id)
    {
        $e = Employee::find($id);
        $e->delete();
        $employees = Employee::get();
        return view('Employees.employee.employeeTable',compact('employees'));
    }
    public function index()
    {
        $departments = Department::get();
        $designations = Designation::get();
        $employees = Employee::with('department','designation')->get(); 
        return view('Employees.employee.employeeTable',compact('employees','departments','designations'));
    }
    // public function desig($id)
    // {
    //     $designation = Designation::get($id);
    //     return response()->json($designation);
    // }
    public function fetchDesignations($departmentId)
    {
        $designations = Designation::where('dept_id', $departmentId)->get();
        return response()->json($designations);
    }

}
