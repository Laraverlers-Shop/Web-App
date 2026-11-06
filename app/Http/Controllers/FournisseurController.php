<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::orderBy('code_fournisseur')->paginate(10);

        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        Fournisseur::create($request->validate([
            'nom_fournisseur' => ['required', 'string', 'max:255'],
            'rue_fournisseur' => ['required', 'string', 'max:255'],
            'code_postal_fournisseur' => ['required', 'string', 'max:20'],
            'ville_fournisseur' => ['required', 'string', 'max:255'],
            'pays_fournisseur' => ['nullable', 'string', 'max:255'],
            'tel_fournisseur' => ['nullable', 'string', 'max:255'],
            'contact_fournisseur' => ['nullable', 'string', 'max:255'],
        ]));

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté.');
    }

    public function show(string $id)
    {
        $fournisseur = Fournisseur::with('produits')->findOrFail($id);

        return view('fournisseurs.show', compact('fournisseur'));
    }

    public function edit(string $id)
    {
        $fournisseur = Fournisseur::findOrFail($id);

        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, string $id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->update($request->validate([
            'nom_fournisseur' => ['required', 'string', 'max:255'],
            'rue_fournisseur' => ['required', 'string', 'max:255'],
            'code_postal_fournisseur' => ['required', 'string', 'max:20'],
            'ville_fournisseur' => ['required', 'string', 'max:255'],
            'pays_fournisseur' => ['nullable', 'string', 'max:255'],
            'tel_fournisseur' => ['nullable', 'string', 'max:255'],
            'contact_fournisseur' => ['nullable', 'string', 'max:255'],
        ]));

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour.');
    }

    public function destroy(string $id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        if ($fournisseur->produits()->exists()) {
            return back()->withErrors('Ce fournisseur a des produits et ne peut pas être supprimé.');
        }
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé.');
    }
}
