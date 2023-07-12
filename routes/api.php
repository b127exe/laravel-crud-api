<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// EMPLOYEE  ROUTES

// get all employees 
Route::get('employees',[EmployeeController::class , "getEmployees"]);

// get specific employee detail
Route::get('employee/{id}',[EmployeeController::class, "getEmployeeById"]);

// add employee
Route::post('add-employee',[EmployeeController::class , 'addEmployee']);

// update employee 
Route::put('update-employee/{id}',[EmployeeController::class, 'updateEmployee']);

// delete employee
Route::delete('delete-employee/{id}',[EmployeeController::class, 'deleteEmployee']);

// STUDENT ROUTES

