<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\HomeController;

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
// Route::get('admin/home',[DashboardController::class,'index'])->name('admin.home');


Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    });
    Route::prefix('user')->namespace('User')->name('user.')->group(function () {
        Route::get('/dashboard',[DashboardController::class,'index'])->name('home');
    });
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/home',[HomeController::class,'index'])->name('home');
    // Route::prefix('admin')->namespace('Admin')->name('admin.')->group(['middleware' => ['role:admin', 'auth:web', 'verified']],function () {
    //     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // });

});

