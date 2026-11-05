<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::with('client')->orderByDesc('date_commande')->paginate(10);

        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('nom_client')->get();

        return view('commandes.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Commande::create($request->validate([
            'date_commande' => ['required', 'date'],
            'condition' => ['required', 'in:LIV,T30'],
            'code_client' => ['required', 'exists:clients,code_client'],
        ]));

        return redirect()->route('commandes.index')->with('success', 'Commande ajoutée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commande = Commande::with(['client', 'produits'])->findOrFail($id);

        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commande = Commande::findOrFail($id);
        $clients = Client::orderBy('nom_client')->get();

        return view('commandes.edit', compact('commande', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->update($request->validate([
            'date_commande' => ['required', 'date'],
            'condition' => ['required', 'in:LIV,T30'],
            'code_client' => ['required', 'exists:clients,code_client'],
        ]));

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commande::findOrFail($id)->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée.');
    }
}
