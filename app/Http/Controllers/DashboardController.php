<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Commande;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'clients' => Client::count(),
            'fournisseurs' => Fournisseur::count(),
            'produits' => Produit::count(),
            'commandes' => Commande::count(),
        ];

        $latestCommandes = Commande::with('client')->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'latestCommandes'));
    }
}