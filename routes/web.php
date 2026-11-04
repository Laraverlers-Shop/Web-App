<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, ClientController, CommandeController,
                          FournisseurController, ProduitController};

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// Authentication routes

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated & Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Module Placeholders
    Route::get('/clients', function () {
        return view('clients.index');
    })->name('clients.index');

    Route::get('/fournisseurs', function () {
        return view('fournisseurs.index');
    })->name('fournisseurs.index');

    Route::get('/produits', function () {
        return view('produits.index');
    })->name('produits.index');

    Route::get('/commandes', function () {
        return view('commandes.index');
    })->name('commandes.index');
});
// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});


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
