<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('index');
});

Route::get('/', [UserController::class, 'db_data'] );

Route::post('/student', [UserController::class, 'insert_data'] );

Route::get('/delete_user/{id}', [UserController::class, 'delete_Data'] );

Route::get('/get_student/{id}', [UserController::class, 'get_student'] );