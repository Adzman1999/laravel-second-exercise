<?php

use App\Http\Controllers\CategoryManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductManagerController;
use App\Http\Controllers\UserController;
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

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');;

// Create New User
Route::post('/users/create', [UserController::class, 'store'])->middleware('auth');

// All Users
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');

// Show Edit Form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

// Update User
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

// Delete User
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');



// ----------------------------
// dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

Route::get('/products/{product}', [DashboardController::class, 'show'])->middleware('auth');


// ----------------------------

// All Categories
Route::get('/categories', [CategoryManagerController::class, 'index'])->middleware('auth')->name('categories.index');

// Show Create Form
Route::get('/categories/create', [CategoryManagerController::class, 'create'])->middleware('auth');

// Store category Data
Route::post('/categories', [CategoryManagerController::class, 'store'])->middleware('auth')->name('categories.store');

// Show Edit Form
Route::get('/categories/{category}/edit', [CategoryManagerController::class, 'edit'])->middleware('auth');

// Update category
Route::put('/categories/{category}', [CategoryManagerController::class, 'update'])->middleware('auth');

// Delete category
Route::delete('/categories/{category}', [CategoryManagerController::class, 'destroy'])->middleware('auth');

// ----------------------------

// All Products
Route::get('/products', [ProductManagerController::class, 'index'])->middleware('auth')->name('products.index');

// Show Create Form
Route::get('/product/create', [ProductManagerController::class, 'create']);

// Store product Data
Route::post('/products', [ProductManagerController::class, 'store'])->middleware('auth')->name('products.store');

// Show Edit Form
Route::get('/products/{product}/edit', [ProductManagerController::class, 'edit'])->middleware('auth');

// Update product
Route::put('/products/{product}', [ProductManagerController::class, 'update'])->middleware('auth');

// Delete product
Route::delete('/products/{product}', [ProductManagerController::class, 'destroy'])->middleware('auth');
