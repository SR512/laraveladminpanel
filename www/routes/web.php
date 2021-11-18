<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\QovexController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => true]);


// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Role Controller
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('/role', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');


    // User Controller
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::post('/change/password', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('change.password');

    // User Profile Controller
    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);
    Route::post('/change/password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('change.password');



});
