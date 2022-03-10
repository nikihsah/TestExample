<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;
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

Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::get('/', [RecordsController::class, 'records'])->name('/');
Route::get('/unLogin', [AccountController::class, 'unLogin']);
Route::post('/newRecords', [RecordsController::class, 'newRecords']);
Route::post('/loginValidate', [AccountController::class, 'loginValidate']);
