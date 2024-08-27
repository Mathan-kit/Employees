<?php

use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[EmployeeController::class,'index'])->name('dashboard');

//Route of Employee

Route::get('/employee',[EmployeeController::class,'show']);
Route::post('/add_employee',[EmployeeController::class,'store']);
Route::get('/show_employee',[EmployeeController::class,'index']);
Route::get('/get_employee/{id}',[EmployeeController::class,'fetch']);
Route::put('/update_employee/{id}',[EmployeeController::class,'update']);
Route::delete('/delete_employee/{id}',[EmployeeController::class,'delete']);
Route::get('/fetch_designations/{departmentId}', [EmployeeController::class, 'fetchDesignations']);


//Route of Department

Route::get('/department',[DepartmentController::class,'show']);
Route::post('/add_department',[DepartmentController::class,'store']);
Route::get('/show_department',[DepartmentController::class,'index'])->middleware("admin");
Route::get('/get_department/{id}',[DepartmentController::class,'fetch']);
Route::put('/update_department/{id}',[DepartmentController::class,'update']);
Route::delete('/delete_department/{id}',[DepartmentController::class,'delete']);

// Route of Designation

Route::get('/designation',[DesignationController::class,'show']);
Route::post('/add_designation',[DesignationController::class,'store']);
Route::get('/show_designation',[DesignationController::class,'index'])->middleware("admin");
Route::get('/get_designation/{id}',[DesignationController::class,'fetch']);
Route::put('/update_designation/{id}',[DesignationController::class,'update']);
Route::delete('/delete_designation/{id}',[DesignationController::class,'delete']);

});
