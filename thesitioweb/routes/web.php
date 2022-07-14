<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UsuarioController;
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
    return view('home');
})->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])
        ->middleware('guest')
        ->name('login.index');

Route::post('/login', [SessionController::class, 'store'])
        ->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('login.destroy');

Route::get('/register', [RegisterController::class, 'create'])
        ->middleware('guest')
        ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');

Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('auth.admin')
        ->name('admin.index');

Route::get('/admin/create-user', [AdminController::class, 'createUserview'])
        ->middleware('auth.admin')
        ->name('admin.createUserview');

Route::post('/admin/create-user', [AdminController::class, 'createUser'])
        ->middleware('auth.admin')
        ->name('admin.createUser');

Route::get('/admin/{user}/destroy', [AdminController::class, 'destroy'])
        ->middleware('auth.admin')
        ->name('admin.destroy');

//EDIT DE ADMIN
Route::get('/admin/{user}/edit', [AdminController::class, 'edit'])
        ->middleware('auth.admin')
        ->name('admin.edit');

        
Route::post('/admin/{user}/edit', [AdminController::class, 'update'])
        ->middleware('auth.admin')
        ->name('admin.update');

Route::get('/user', [UsuarioController::class, 'index'])
        ->middleware('auth.user')
        ->name('user.index');

        
Route::get('/operator', [OperatorController::class, 'index'])
        ->middleware('auth.operator')
        ->name('operator.index');

Route::get('/operator/{user}/edit', [OperatorController::class, 'edit'])
        ->middleware('auth.operator')
        ->name('operator.edit');

Route::put('/operator/{user}/edit', [OperatorController::class, 'update'])
        ->middleware('auth.operator')
        ->name('operator.update');

