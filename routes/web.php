<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, ClientController, CommandeController,
                          FournisseurController, ProduitController};

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clients', ClientController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);