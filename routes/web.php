<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('Auth.index');
})->name('login');
Route::post('loginPost',[AuthController::class, 'loginPost'])->name('loginPost');
route::get('/register',[AuthController::class, 'register'])->name('register');
route::post('/registerPost',[AuthController::class, 'registerPost'])->name('registerPost');

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
