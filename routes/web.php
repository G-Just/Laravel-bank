<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


// Auth
Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('clients/new/', [ClientController::class, 'create'])->name('clients.create');

// Accounts
Route::get('accounts/new/', [AccountController::class, 'create'])->name('accounts.create');
Route::get('accounts/transfer/', [AccountController::class, 'edit'])->name('accounts.transfer');
