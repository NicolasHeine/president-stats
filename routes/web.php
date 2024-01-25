<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Game;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RoundController;
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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:admin'])->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('/users', AdminUserController::class)->name('index', 'users')->missing(function (Request $request) {
            return Redirect::route('admin.users');
        });
        Route::resource('/games', GameController::class)->name('index', 'games')->missing(function (Request $request) {
            return Redirect::route('admin.games');
        });
        Route::resource('/players', PlayerController::class)->name('index', 'players')->missing(function (Request $request) {
            return Redirect::route('admin.players');
        });;
        Route::group(['prefix' => 'games/{game}', 'as' => 'games.'], function(){
            Route::resource('/rounds', RoundController::class)->name('index', 'rounds')->missing(function (Request $request) {
                return Redirect::route('admin.games.rounds', ['game' => Game::all()->sortBy('created_at')->first()]);
            });;
        });
    });
});

