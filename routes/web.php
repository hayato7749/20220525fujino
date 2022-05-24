<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/check', [ContactController::class, 'check']);
Route::post('/thanks', [ContactController::class, 'send']);
Route::get('/search', [ContactController::class, 'list']);
Route::get('/list', [ContactController::class, 'list']);
Route::get('/delete/{id}', [ContactController::class, 'delete']);
Route::post('/delete/{id}', [ContactController::class, 'remove']);
