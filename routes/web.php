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
Route::prefix('/clients')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/{client}/delete', [ClientController::class, 'delete'])->name('clients.delete');
    Route::delete('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
});

// Accounts
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
// Route::get('/accounts/transfer', [AccountController::class, 'edit'])->name('accounts.transfer');
Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/{account}', [AccountController::class, 'update'])->name('accounts.update');
