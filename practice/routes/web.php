<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// use App\http\Controllers\PracticeController;
use App\http\Controllers\CvsController;
use App\http\Controllers\TestTableController;
use App\http\Controllers\UserController;
use App\http\Controllers\HomeController;


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
//     return view('addEmployee');
// });

/* Route::get('/',[CvsController::class,'addCv']);
Route::post('save', [CvsController::class, 'saveBrandCv'])->name('brandcv');
Route::get('brandcvs',[CvsController::class,'getbrandlist']);
Route::get('branddata',[CvsController::class,'getbranddata'])->name('getbrand.list');
Route::get('edit-cv/{id}',[CvsController::class,'editCV']);
 */


 Route::get('/dashboard',[UserController::class,'dashboard']);
 Route::get('/',[UserController::class,'signup'])->name('sign');
 Route::post('/save',[UserController::class,'save'])->name('sign-up');
 Route::get('/login',[UserController::class,'login'])->name('login');
 Route::get('/saveLogin',[UserController::class,'saveLogin'])->name('save-login');

//*** sending Mail */
Route::get('send-mail/',[HomeController::class,'mailSend']);





// Route::get('get-taxonomy-brands-data/{id}',[CvsController::class,'getTaxonomyBrandsData']);

// Route::get('blog/', [BlogController::class, 'index'])->name('blogs.index');


// Route::get('users', [CvsController::class, 'index'])->name('users.index');
