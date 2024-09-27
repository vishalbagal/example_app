<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('student_list');
});

Route::get('/',[StudentController::class,'index']);

Route::get('/add_student',[StudentController::class,'create']);

Route::post('/save_student_data',[StudentController::class,'save']);

Route::get('/edit_student_data/{id}',[StudentController::class,'edit']);

Route::post('/update_student_data',[StudentController::class,'update'])->name('update.student');

Route::get('/delete_student_data/{id}',[StudentController::class,'delete']);
