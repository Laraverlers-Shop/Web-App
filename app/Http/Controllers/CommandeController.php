<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with(['client', 'produits'])
            ->orderByDesc('date_commande')
            ->orderByDesc('numero_commande')
            ->paginate(10);

        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        return view('commandes.create', [
            'clients' => Client::orderBy('nom_client')->get(),
            'produits' => Produit::orderBy('designation')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateCommande($request);

        $commande = DB::transaction(function () use ($data) {
            $commande = Commande::create([
                'date_commande' => $data['date_commande'],
                'condition' => $data['condition'],
                'code_client' => $data['code_client'],
            ]);

            $commande->produits()->sync(
                $this->formatProduits($data['produits'])
            );

            return $commande;
        });

        return redirect()
            ->route('commandes.show', $commande->getKey())
            ->with('success', 'Commande créée avec succès.');
    }

    public function show(string $commande)
    {
        $commande = Commande::with(['client', 'produits'])
            ->findOrFail($commande);

        return view('commandes.show', compact('commande'));
    }

    public function edit(string $commande)
    {
        $commande = Commande::with('produits')
            ->findOrFail($commande);

        return view('commandes.edit', [
            'commande' => $commande,
            'clients' => Client::orderBy('nom_client')->get(),
            'produits' => Produit::orderBy('designation')->get(),
        ]);
    }

    public function update(Request $request, string $commande)
    {
        $commande = Commande::findOrFail($commande);
        $data = $this->validateCommande($request);

        DB::transaction(function () use ($commande, $data) {
            $commande->update([
                'date_commande' => $data['date_commande'],
                'condition' => $data['condition'],
                'code_client' => $data['code_client'],
            ]);

            $commande->produits()->sync(
                $this->formatProduits($data['produits'])
            );
        });

        return redirect()
            ->route('commandes.show', $commande->getKey())
            ->with('success', 'Commande modifiée avec succès.');
    }

    public function destroy(string $commande)
    {
        $commande = Commande::findOrFail($commande);

        DB::transaction(function () use ($commande) {
            $commande->produits()->detach();
            $commande->delete();
        });

        return redirect()
            ->route('commandes.index')
            ->with('success', 'Commande supprimée avec succès.');
    }

    private function validateCommande(Request $request): array
    {
        return $request->validate([
            'date_commande' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'condition' => [
                'required',
                Rule::in(['LIV', 'T30']),
            ],
            'code_client' => [
                'required',
                Rule::exists('clients', 'code_client'),
            ],
            'produits' => [
                'required',
                'array',
                'min:1',
            ],
            'produits.*.code_produit' => [
                'required',
                'distinct',
                Rule::exists('produits', 'code_produit'),
            ],
            'produits.*.quantite' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);
    }

    private function formatProduits(array $produits): array
    {
        $result = [];

        foreach ($produits as $produit) {
            $result[$produit['code_produit']] = [
                'quantite' => $produit['quantite'],
            ];
        }

        return $result;
    }
}
