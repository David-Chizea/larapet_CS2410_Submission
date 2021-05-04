<?php

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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['adminware', 'auth']], function () {
    Route::get('/adminhome', [AdminController::class, 'index'])->name('admin_home');
    Route::resource('animals', AnimalController::class);
    Route::get('/viewRequests', [AdoptionController::class, 'viewRequests'])
        ->name('view_requests');
    Route::get('/approveRequest/{id}', [AdoptionController::class, 'approveRequest'])
        ->name('approve_requests');
    Route::get('/denyRequest/{id}', [AdoptionController::class, 'denyRequest'])
        ->name('deny_requests');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('/display', [AnimalController::class, 'display'])
        ->name('rehome_pet');
    Route::post('/create', [AdoptionController::class, 'create'])
        ->name('request.adoption');
    Route::get('/viewStatus', [AdoptionController::class, 'viewStatus'])
        ->name('view_status');
});
