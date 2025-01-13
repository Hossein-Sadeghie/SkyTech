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
