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
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Clients
Route::prefix('/clients')->name('clients.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('list');
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::post('/', [ClientController::class, 'store'])->name('store');
    Route::get('/{client}', [ClientController::class, 'show'])->name('show');
    Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
    Route::put('/{client}', [ClientController::class, 'update'])->name('update');
    Route::get('/{client}/delete', [ClientController::class, 'delete'])->name('delete');
    Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
});

// Accounts
Route::prefix('/accounts')->name('accounts.')->group(function () {
    Route::get('/create', [AccountController::class, 'create'])->name('create');
    Route::post('/', [AccountController::class, 'store'])->name('store');
    Route::get('/{account}/deposit', [AccountController::class, 'deposit'])->name('deposit');
    Route::get('/{account}/withdraw', [AccountController::class, 'withdraw'])->name('withdraw');
    Route::get('/{account}/edit', [AccountController::class, 'edit'])->name('edit');
    Route::put('/{account}', [AccountController::class, 'update'])->name('update');
    Route::get('/{account}/delete', [AccountController::class, 'delete'])->name('delete');
    Route::delete('/{account}', [AccountController::class, 'destroy'])->name('destroy');
});
