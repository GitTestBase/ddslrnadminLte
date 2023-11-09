<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('Auth.index');
})->name('login');
Route::post('loginPost',[AuthController::class, 'loginPost'])->name('loginPost');
route::get('/register',[AuthController::class, 'register'])->name('register');
route::post('/registerPost',[AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/rememberMe',[AuthController::class,'rememberMe'])->name('rememberMe');

Route::middleware(['auth'])->group(function()
{
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});