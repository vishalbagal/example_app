<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use App\Http\Controllers\BlogController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

/*
Route::get('/register',[userController::class,'register'])->name('register');
Route::post('/registersave',[userController::class,'saveregister'])->name('register.save');
Route::get('/',[userController::class,'login'])->name('login');
// Route::get('/',[userController::class,'login'])->name('check.login');
Route::post('/authenticate-login', [userController::class, 'authenticateLgoin'])->name('check.login');
// Route::post('/loginsave',[userController::class,'loginsave'])->name('login.save');


Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{pid}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{pid}/',[ProductController::class,'update'])->name('products.update');
Route::get('/products/{pid}/delete',[ProductController::class,'delete'])->name('products.delete');

Route::get('/profile',[userController::class,'userProfile'])->name('profile');
Route::get('/logout', [userController::class, 'logout'])->name('exit');
 */






// Public routes (accessible without authentication)
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registersave', [UserController::class, 'saveRegister'])->name('register.save');

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/authenticate-login', [UserController::class, 'authenticateLogin'])->name('check.login');

// Protected routes (only accessible when logged in)
Route::middleware(['authcheck'])->group(function () {
    // Product routes
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('clientData', [ProductController::class, 'clientData']);
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{pid}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{pid}/disable', [ProductController::class, 'disable'])->name('products.disable');
    Route::put('/products/{pid}/', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{pid}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/products/getProductData', [ProductController::class, 'getProductData'])->name('getProduct.Data');

    // Profile route
    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');

    // Logout route
    Route::get('/logout', [UserController::class, 'logout'])->name('exit');

});



// Route::get('/', [ProductController::class, 'index'])->name('product.index');
