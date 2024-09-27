<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\userController;

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
Route::group(['middleware' => ['auth.check']], function (){
    Route::view('/welcome','layouts.welcome')->name('home');
    Route::get('logout', [userController::class, 'logout'])->name('exit');

});

/* Route::middleware('auth')->group(function(){
    Route::view('/welcome','layouts.welcome')->name('home');
    Route::get('logout', [userController::class, 'logout'])->name('exit');
});
 */
// Route::view('/','welcome');
Route::get("/",[userController::class,'login'])->name('login');
Route::post('/loginpost',[userController::class,'loginPost'])->name('login.post');

Route::get('register/',[userController::class,'register'])->name('register');

Route::post('/registerpost',[userController::class,'registerPost'])->name('register.post');


