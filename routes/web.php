<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;


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

Route::get('/user', [UserController::class, 'index']);

Route::get('add-user', function () {
    return view('add_user');
});

Route::post('/insert-user', [UserController::class, 'insertuser']);

Route::get('/edit_user/{id}', [UserController::class, 'edituser'])->name('edit.user');

Route::post('/update-user', [UserController::class, 'updateuser'])->name('update.user');

Route::get('/welcome/{id}', [UserController::class, 'deleteuser'])->name('delete.user');
