<?php

use App\Http\Controllers\{
    AuthController,
    ClientController,
    CommandeController,
    DashboardController,
    FournisseurController,
    ProduitController
};
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('clients', ClientController::class);
    Route::resource('fournisseurs', FournisseurController::class);
    Route::resource('produits', ProduitController::class);
    Route::resource('commandes', CommandeController::class);
});