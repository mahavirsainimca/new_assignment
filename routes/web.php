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

Auth::routes();

Route::get('/', function () {
    return view('web.home');
});

// Customer Login
Route::controller(App\Http\Controllers\Web\AuthController::class)->group(function() {
    Route::get('/user-login','login')->name('user-login');
    Route::get('/user-logout', 'logout')->name('user-logout');
    Route::post('/authenticate','authenticate')->name('authenticate');
});

// Customer
Route::group(['middleware' => ['auth:customer'] ], function(){
    Route::get('/profile', [App\Http\Controllers\Web\UserController::class, 'index'])->name('profile');
});

Route::get('/user-simulate/{id}', [App\Http\Controllers\Web\UserController::class, 'userSimulate'])->name('user-simulate');

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'getLogin'])->name('adminLogin');

    Route::group(['middleware'=>['auth']], function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/customer/listing', [App\Http\Controllers\Admin\CustomerController::class, 'index']);

        Route::get('/category/listing', [App\Http\Controllers\Admin\CategoryController::class, 'index']);//->name('home');
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::get('/category/destroy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    });

});

