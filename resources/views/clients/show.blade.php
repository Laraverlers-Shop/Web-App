@extends('layouts.app')
@section('title', 'Fiche client')
@section('content')
<div class="card">
    <h2>{{ $client->nom_client }} <small>({{ $client->code_client }})</small></h2>
    <p>{{ $client->rue_client }}, {{ $client->code_postal_client }} {{ $client->ville_client }}</p>
    <p>Type : {{ $client->type_client }} | Remise : {{ $client->remise_speciale }} %</p>
    <a href="{{ route('clients.edit', $client->code_client) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('clients.index') }}" class="btn">Retour</a>
</div>
<div class="card"><h3>Commandes du client</h3>
    <table class="table"><thead><tr><th>Numéro</th><th>Date</th><th>Condition</th></tr></thead><tbody>
        @forelse ($client->commandes as $commande)
            <tr><td><a href="{{ route('commandes.show', $commande->numero_commande) }}">{{ $commande->numero_commande }}</a></td><td>{{ $commande->date_commande }}</td><td>{{ $commande->condition }}</td></tr>
        @empty
            <tr><td colspan="3">Aucune commande.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
