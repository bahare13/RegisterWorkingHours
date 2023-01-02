<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/', [AuthController::class, 'index']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login-store');

Route::group(['middleware' => 'web'], function () {
    Route::post('/user', [UserController::class, 'create']);
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/hour', [HourController::class, 'create'])->name('hour-store');
    Route::get('/hour', [HourController::class, 'index'])->name('list-hour');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting-index');
    Route::post('/setting', [SettingController::class, 'create'])->name('setting');
});
