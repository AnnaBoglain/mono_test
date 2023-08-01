<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;

Route::get('/users/create', [ UserController::class, 'create' ])->name('user.create');
Route::post('/users', [ UserController::class, 'store' ])  ->name('user.store');
Route::patch('/users/update_user/{user}', [ UserController::class, 'update_user' ]) -> name('user.update_user');
Route::get('/users/delete/{car}', [ UserController::class, 'delete' ]) -> name('user.delete');
Route::get('/users/select', [ UserController::class, 'select' ]);
Route::get('/users', [ UserController::class, 'index' ]) -> name('user.index');
Route::get('/users/filter', [ UserController::class, 'filter' ]) -> name('user.filter');
Route::get('/users/{user}', [ UserController::class, 'show' ]) -> name('user.show');
Route::get('/users/{user}/edit', [ UserController::class, 'edit' ]) -> name('user.edit');

Route::post('/users/{user}/store', [ CarController::class, 'store' ])  ->name('user.store.car');
Route::patch('/users/update_car/{car}', [ CarController::class, 'update' ]) -> name('user.update_car');
//Route::patch('/users/{user}', [ UserController::class, 'update' ]) -> name('user.update');

