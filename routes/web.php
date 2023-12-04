<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

// Home Page
Route::get('/', [MenuController::class, 'index'])->name('home');

// Food Detail Page
Route::get('/menu/{food_id}', [MenuController::class, 'detail'])->name('detail');

// Filtering Page
Route::get('/mainCourse', [MenuController::class, 'mainCourse'])->name('mainCourse');
Route::get('/beverages', [MenuController::class, 'beverages'])->name('beverages');
Route::get('/desserts', [MenuController::class, 'desserts'])->name('desserts');

// Searching Page
Route::get('/search', [MenuController::class, 'search'])->name('search');
Route::post('/search', [MenuController::class, 'result'])->name('result');

// Login Page
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticateUser'])->name('authenticateUser');

// Register Page
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'createUser'])->name('createUser');

// Log Out Page
Route::get('/logout', [AuthController::class, 'deauthenticateUser'])->name('deauthenticateUser');

// Profile Page
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [UserController::class, 'updateUser'])->name('updateUser');
});

// Add Menu Page
Route::middleware(['auth.role:admin'])->group(function () {
    Route::post('/add', [MenuController::class, 'addMenu'])->name('addMenu');
    Route::get('/add', [MenuController::class, 'returnAddMenu'])->name('returnAddMenu');

    // Update
    Route::get('/update', [MenuController::class, 'updatePage'])->name('updatePage');
    Route::put('/update', [MenuController::class, 'updateMenu'])->name('updateMenu');

    // Delete
    Route::delete('/delete', [MenuController::class, 'deleteMenu'])->name('deleteMenu');

    // Manage Food Page
    // General
    Route::get('/manage', [MenuController::class, 'returnManageMenu'])->name('returnManageMenu');
    Route::get('/searchM', [MenuController::class, 'searchM'])->name('searchM');
    Route::post('/searchM', [MenuController::class, 'resultM'])->name('resultM');
});