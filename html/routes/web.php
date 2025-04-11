<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LogInUserController;
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


Route::get('/', [ContactController::class, 'index']);
Route::get('/contacts/create', [ContactController::class, 'create']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->middleware('auth');
Route::patch('/contacts/{contact}', [ContactController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [LogInUserController::class, 'create'])->name('login');
Route::post('/login', [LogInUserController::class, 'store']);
Route::post('/logout', [LogInUserController::class, 'destroy']);