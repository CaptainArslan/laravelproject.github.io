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

Route::get('/', [UserController::class, 'db_data'] );
Route::post('/student', [UserController::class, 'db_insert_update_data'] );
Route::get('/delete_user/{id}', [UserController::class, 'delete_Data'] );


//Ajax Call to get user in modal in index.blade.php
Route::get('/get_student/{id}', [UserController::class, 'get_student'] );
//Ajax Call to check user Email in modal in index.blade.php to show dupkication
Route::get('/get_emails/{email}', [UserController::class, 'get_email'] );