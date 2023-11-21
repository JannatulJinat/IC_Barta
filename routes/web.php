<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
Route::post('/verifyUser', [AuthController::class, 'authenticate']);
Route::post('/saveUser', [AuthController::class, 'saveUser']);
Route::post('/editUser', [AuthController::class, 'editUser']);
Route::get('/profile', [AuthController::class, 'profileView']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/singlePost/{id}', [PostController::class, 'viewSinglePost']);
Route::get('/newsfeed', [PostController::class, 'viewAllPost']);
Route::get('/deletePost/{id}', [PostController::class, 'deletePost']);
Route::get('/editPost/{id}', [PostController::class, 'showUpdatePost']);
Route::post('/updatePost/{id}', [PostController::class, 'updatePost']);
Route::post('/createPost', [PostController::class, 'createPost']);
