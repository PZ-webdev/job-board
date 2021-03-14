<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');

Route::get('/jobs/{title}', [JobController::class, 'show'])->name('job.show');

Route::post('/search', [JobController::class, 'search'])->name('search-job');


Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
