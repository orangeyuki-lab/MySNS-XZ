<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/user/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/user/{username}/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Auth::routes();