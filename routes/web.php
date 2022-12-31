<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageMenusController;

use App\Http\Controllers\User\HomeController;


use App\Http\Controllers\IconController;

use App\Http\Controllers\Apps\ThreeDModel\IndexController as ThreeDModelController;

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
Route::get('/api/icons/{id?}',[IconController::class,'iconlist'])->name('icons');
Route::get('/icons/{query?}/{version?}',[IconController::class,'icons'])->name('icons');
Route::get('/test',[IconController::class,'test'])->name('test');

Route::get('apps/threedmodel',[ThreeDModelController::class,'index'])->name('apps.threedmodel');

Route::group(['middleware' => ['role:user', 'auth:web']],function () {
    Route::get('user/home',[HomeController::class,'index'])->name('user.home');
    

});

Route::prefix('superadmin')->namespace('Admin')->name('admin.')->group(function () {
    Route::group(['middleware' => ['role:admin', 'auth:web']],function () {
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::prefix('manage')->name('manage.')->group(function () {
            Route::get('menus',[ManageMenusController::class,'index'])->name('menus.index');
            Route::get('menus/create',[ManageMenusController::class,'create'])->name('menus.create');
            Route::get('menus/status/{id?}',[ManageMenusController::class,'changeStatus'])->name('menus.status');
            Route::post('menus/store',[ManageMenusController::class,'store'])->name('menus.store');
            Route::delete('menus/destroy/{id?}',[ManageMenusController::class,'destroy'])->name('menus.destroy');
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

