<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show()
    {
        return view('Employees.department.department');
    }
    public function store(Request $request)
    {
        $department = new Department();
        $department->dept_name = $request->dept_name;
        $department->description = $request->description;
        $department->save();
        $departments = Department::get();
        return view('Employees.department.departmentTable',compact('departments'));
    }
    public function fetch($id)
    {
        $department = Department::find($id);
        return view('Employees.department.departmentUpdate',compact('department'));
    }
    public function update(Request $data,$id)
    {
        $dept = Department::find($id);
        $dept->dept_name = $data->dept_name;
        $dept->description = $data->description;
        $dept->update();
        $departments = Department::get();
        return view('Employees.department.departmentTable',compact('departments'));
    }
    public function delete($id)
    {
        $dept = Department::find($id);
        $dept->delete();
        $departments = Department::get();
        return view('Employees.department.departmentTable',compact('departments'));
    }
    public function index()
    {
        $departments = Department::get();
        return view('Employees.department.departmentTable',compact('departments'));
    }
}
