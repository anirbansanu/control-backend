<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageMenusController;

use App\Http\Controllers\User\HomeController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    //return back();
    return '<h1>Cache facade value cleared</h1>';
});

// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});
// Route::get('admin/home',[DashboardController::class,'index'])->name('admin.home');
Route::get('/home',[HomeController::class,'index'])->name('home');





Route::group(['middleware' => ['role:user', 'auth:web']],function () {
    Route::get('user/home',[HomeController::class,'index'])->name('user.home');

});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::group(['middleware' => ['role:admin', 'auth:web']],function () {
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::prefix('manage')->name('.manage.')->group(function () {
            Route::get('menus',[ManageMenusController::class,'index'])->name('index');
        });
    });
});

// Route::group(['middleware' => ['role:admin', 'auth:web']],function () {
//     Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

// });


// Route::prefix('user')->namespace('User')->name('user.')->group(function () {
//     Route::group(['middleware' => ['role:user', 'auth:web']],function () {
//         Route::get('/home',[HomeController::class,'index'])->name('home');

//     });
// });

// Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    
//     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//     Route::get('/home',[HomeController::class,'index'])->name('home');
//     // Route::prefix('admin')->namespace('Admin')->name('admin.')->group(['middleware' => ['role:admin', 'auth:web', 'verified']],function () {
//     //     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//     // });

// });

