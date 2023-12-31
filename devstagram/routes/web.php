<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta',[RegisterController::class,'crear'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store']);

Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');

Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'store']);


Route::post('/logout',[\App\Http\Controllers\logoutController::class,'store'])->name('logout');
