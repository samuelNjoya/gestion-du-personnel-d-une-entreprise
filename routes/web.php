<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\EmployeController;
use App\Http\Controllers\backend\JobController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class, 'auth_login']);
Route::get('logout',[AuthController::class,'logout']);


Route::group(['middleware' => 'common'], function(){

    //dashboard
    Route::get('panel/dashboard',[DashboardController::class, 'dashboard']);
   // Route::get('panel/job',[DashboardController::class, 'dashboard1']);

   //Admin
   Route::get('panel/admin',[AdminController::class, 'admin_list']);
   Route::get('panel/admin/create',[AdminController::class, 'admin_create']);
   Route::post('panel/admin/create',[AdminController::class, 'admin_insert']);
   Route::get('panel/admin/edit/{id}',[AdminController::class, 'admin_edit']);
   Route::post('panel/admin/edit/{id}',[AdminController::class, 'admin_update']);
   Route::get('panel/admin/delete/{id}',[AdminController::class, 'admin_delete']);

    //Employe
    Route::get('panel/employe',[EmployeController::class, 'employe_list']);
    Route::get('panel/employe/create',[EmployeController::class, 'employe_create']);
    Route::post('panel/employe/create',[EmployeController::class, 'employe_insert']);
    Route::get('panel/employe/view/{id}',[EmployeController::class, 'employe_view']);
    Route::get('panel/employe/edit/{id}',[EmployeController::class, 'employe_edit']);
    Route::post('panel/employe/edit/{id}',[EmployeController::class, 'employe_update']);
    Route::get('panel/employe/delete/{id}',[EmployeController::class, 'employe_delete']);

    //job
    Route::get('panel/job',[JobController::class, 'job_list']);
    Route::get('panel/job/create',[JobController::class, 'job_create']);
    Route::post('panel/job/create',[JobController::class, 'job_insert']);
    Route::get('panel/job/edit/{id}',[JobController::class, 'job_edit']);
    Route::post('panel/job/edit/{id}',[JobController::class, 'job_update']);
    Route::get('panel/job/delete/{id}',[JobController::class, 'job_delete']);

    //department
    Route::get('panel/department',[DepartmentController::class, 'department_list']);
    Route::get('panel/department/create',[DepartmentController::class, 'department_create']);
    Route::post('panel/department/create',[DepartmentController::class, 'department_insert']);
    Route::get('panel/department/edit/{id}',[DepartmentController::class, 'department_edit']);
    Route::post('panel/department/edit/{id}',[DepartmentController::class, 'department_update']);
    Route::get('panel/department/delete/{id}',[DepartmentController::class, 'department_delete']);
});

