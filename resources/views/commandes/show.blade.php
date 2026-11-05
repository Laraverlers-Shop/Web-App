@extends('layouts.app')
@section('title', 'Fiche commande')
@section('content')
<div class="card"><h2>Commande {{ $commande->numero_commande }}</h2><p>Date : {{ $commande->date_commande }}</p><p>Client : {{ $commande->client->nom_client }}</p><p>Condition : {{ $commande->condition }}</p>
<a href="{{ route('commandes.edit', $commande->numero_commande) }}" class="btn btn-warning">Modifier</a> <a href="{{ route('commandes.index') }}" class="btn">Retour</a></div>
<div class="card"><h3>Produits</h3><table class="table"><thead><tr><th>Produit</th><th>Quantité</th></tr></thead><tbody>
@forelse ($commande->produits as $produit)<tr><td>{{ $produit->designation }}</td><td>{{ $produit->pivot->quantite }}</td></tr>@empty<tr><td colspan="2">Aucun produit dans cette commande.</td></tr>@endforelse
</tbody></table></div>
@endsection
