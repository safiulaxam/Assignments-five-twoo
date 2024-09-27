<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login',[LoginController::class, 'index'])->name('login');

Route::post('process',[LoginController::class, 'process'])->name('login.process');

Route::get('login/logout',[LoginController::class,'logout'])->name('login.logout');


Route::get('users',function(){
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('cars',function(){
    return view('cars.index');
})->name('cars')->middleware('auth');

Route::get('/rental',function(){
    return view('rental.index');
})->name('rental')->middleware('auth');