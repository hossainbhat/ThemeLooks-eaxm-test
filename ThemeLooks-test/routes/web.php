<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function(){
    Route::group(['middleware' => ['auth']],function(){

        // Route::get('admin/users', [App\Http\Controllers\UserController::class, 'users']);
        // Route::match(['get','post'],'admin/add-edit-user/{id?}', [App\Http\Controllers\UserController::class, 'addEditUser']);
        // Route::get('admin/delete-user/{id}', [App\Http\Controllers\UserController::class, 'deleteUser']);

        Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
        Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::get('delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
