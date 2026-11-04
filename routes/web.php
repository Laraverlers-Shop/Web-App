<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, ClientController, CommandeController,
                          FournisseurController, ProduitController};

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clients', ClientController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);

Route::get('/clients-form/create', fn () => view('clients.create'))->name('clients.form.create');
Route::get('/clients-form/edit', fn () => view('clients.edit'))->name('clients.form.edit');
Route::get('/fournisseurs-form/create', fn () => view('fournisseurs.create'))->name('fournisseurs.form.create');
Route::get('/fournisseurs-form/edit', fn () => view('fournisseurs.edit'))->name('fournisseurs.form.edit');
Route::get('/produits-form/create', fn () => view('produits.create'))->name('produits.form.create');
Route::get('/produits-form/edit', fn () => view('produits.edit'))->name('produits.form.edit');
