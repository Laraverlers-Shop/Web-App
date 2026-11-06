<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('code_client')->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_client' => ['required', 'string', 'max:255'],
            'rue_client' => ['required', 'string', 'max:255'],
            'code_postal_client' => ['required', 'string', 'max:20'],
            'ville_client' => ['required', 'string', 'max:255'],
            'type_client' => ['required', 'in:PU,PA,LI,AS,DI'],
            'remise_speciale' => ['required', 'integer', 'min:0', 'max:100'],
        ]);
        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client ajouté.');
    }

    public function show(string $id)
    {
        $client = Client::with('commandes')->findOrFail($id);

        return view('clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->validate([
            'nom_client' => ['required', 'string', 'max:255'],
            'rue_client' => ['required', 'string', 'max:255'],
            'code_postal_client' => ['required', 'string', 'max:20'],
            'ville_client' => ['required', 'string', 'max:255'],
            'type_client' => ['required', 'in:PU,PA,LI,AS,DI'],
            'remise_speciale' => ['required', 'integer', 'min:0', 'max:100'],
        ]));

        return redirect()->route('clients.index')->with('success', 'Client mis à jour.');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        if ($client->commandes()->exists()) {
            return back()->withErrors('Ce client a des commandes et ne peut pas être supprimé.');
        }
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé.');
    }
}
