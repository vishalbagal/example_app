<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EmployeeController;
use App\http\Controllers\BlogController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[EmployeeController::class,'index']);

// Route::get('/',[EmployeeController::class,'data'])->name('data.tables.data');
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');

// Route::get('/',[EmployeeController::class,'index']);

Route::get('/add_employee_data',[EmployeeController::class,'create']);

Route::post('/save_employee_data',[EmployeeController::class,'save']);

Route::get('/edit_employee_data/{id}',[EmployeeController::class,'edit']);

Route::post('/update_employee_data',[EmployeeController::class,'update'])->name('update.employee');

Route::get('/delete_employee_data/{id}',[EmployeeController::class,'delete']);
