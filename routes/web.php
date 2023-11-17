<?php

use App\Http\Controllers\AuthController;
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
Route::get('/', [AuthController::class, 'showLoginPage']);
Route::get('/register', [AuthController::class, 'showSignupPage']);
Route::get('/profile/edit', [AuthController::class, 'showEditProfilePage']);
Route::get('/newsfeed', [AuthController::class, 'showNewsFeedPage']);
Route::post('/verifyUser', [AuthController::class, 'authenticate']);
Route::post('/saveUser', [AuthController::class, 'saveUser']);
Route::post('/editUser', [AuthController::class, 'editUser']);
Route::get('/profile', [AuthController::class, 'profileView']);
Route::get('/logout', [AuthController::class, 'logout']);
