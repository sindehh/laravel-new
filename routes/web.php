<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CustomerController::class, 'index'])->middleware('auth');
Route::get('/addCustomer',[CustomerController::class, 'addCustomer'])->middleware('auth');
Route::post('/saveCustomer', [CustomerController::class, 'saveCustomer']);
Route::get('/edit/{id}', [CustomerController::class, 'edit'])->middleware('auth');
Route::post('updateCustomer', [CustomerController::class, 'updateCustomer'])->middleware('auth');

Route::get('/user', [UserController::class, 'useer'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register']);



Route::post('/login/process', [UserController::class, 'process']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/delete/{id}', [UserController::class, 'delete'])->middleware('auth');
