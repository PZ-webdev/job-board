<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Psr7\Request;

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

Route::get('/jobs/{id}', [JobController::class, 'show'])->name('job.show');

Route::post('/search', [JobController::class, 'search'])->name('search-job');

Route::post('/applyforjob', [JobController::class, 'applyforjob'])->name('applyforjob');

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/createCV', [HomeController::class, 'createCvPage'])->name('create.cv');
    
    Route::post('/createCV/store', [HomeController::class, 'storeCv'])->name('store.cv');
});

