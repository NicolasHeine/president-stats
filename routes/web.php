<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authenticate;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth:admin'])->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('/users', AdminUserController::class)->name('index', 'users');
    });
});

