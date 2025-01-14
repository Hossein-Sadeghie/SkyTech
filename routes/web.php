<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , 'loginPhone'])->name('loginPhone');
Route::post('/', [HomeController::class , 'loginPhoneForm'])->name('loginPhoneForm');


Route::get('/login' ,[HomeController::class, 'login'])->name('login');
Route::post('/login' ,[HomeController::class, 'loginForm'])->name('loginForm');


Route::get('/register' ,[HomeController::class, 'register'])->name('register');
Route::post('/register' ,[HomeController::class, 'registerForm'])->name('registerForm');

Route::post('logout', [HomeController::class, 'logout'])->middleware('auth')->name('logout');


Route::prefix('Admin')->middleware(['auth', 'authAdmin'])->group(function () {

    Route::get('/dashboard',function (){
       return view('Admin.dashboard');
    })->name('Admin.dashboard');

});






Route::prefix('User')->middleware(['auth', 'authUser'])->group(function () {


    Route::get('/dashboard',function (){
        return view('User.dashboard');
    })->name('User.dashboard');


});



Route::prefix('Supplier')->middleware(['auth', 'authSupplier'])->group(function () {


    Route::get('/dashboard',function (){
        return view('Supplier.dashboard');
    })->name('Supplier.dashboard');


});
