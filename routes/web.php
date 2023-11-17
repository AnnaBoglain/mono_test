<?php

use App\Http\Controllers\DriverVueController;
use Illuminate\Support\Facades\Auth;
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


//use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;

Route::get('/users/create', [ DriverController::class, 'create' ])->name('user.create');
Route::post('/users', [ DriverController::class, 'store' ])  ->name('user.store');

Route::post('/users/login', [ DriverController::class, 'login' ])  ->name('user.login');

Route::patch('/users/update_driver/{user}', [ DriverController::class, 'update_driver' ]) -> name('user.update_user');
Route::get('/users/delete/{car}', [ DriverController::class, 'delete' ]) -> name('user.delete');
Route::get('/users/select', [ DriverController::class, 'select' ]);

//Route::get('/users', [ DriverController::class, 'index_vue' ]) -> name('user.index');
Route::get('/users', [ DriverController::class, 'index' ]) -> name('user.index');



Route::get('/users/filter', [ DriverController::class, 'filter' ]) -> name('user.filter');
Route::get('/users/{user}', [ DriverController::class, 'show' ]) -> name('user.show');
Route::get('/users/{user}/edit', [ DriverController::class, 'edit' ]) -> name('user.edit');

Route::post('/users/{user}/store', [ CarController::class, 'store' ])  ->name('user.store.car');
Route::patch('/users/update_car/{car}', [ CarController::class, 'update' ]) -> name('user.update_car');

Auth::routes();

//Route::get('{any}', function () {
//    return view('index');
//})->where('any', '.*');



