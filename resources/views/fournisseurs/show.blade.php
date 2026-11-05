@extends('layouts.app')
@section('title', 'Fiche fournisseur')
@section('content')
<div class="card"><h2>{{ $fournisseur->nom_fournisseur }} <small>({{ $fournisseur->code_fournisseur }})</small></h2>
<p>{{ $fournisseur->rue_fournisseur }}, {{ $fournisseur->code_postal_fournisseur }} {{ $fournisseur->ville_fournisseur }}, {{ $fournisseur->pays_fournisseur }}</p>
<p>Téléphone : {{ $fournisseur->tel_fournisseur ?? '-' }} | Contact : {{ $fournisseur->contact_fournisseur ?? '-' }}</p>
<a href="{{ route('fournisseurs.edit', $fournisseur->code_fournisseur) }}" class="btn btn-warning">Modifier</a> <a href="{{ route('fournisseurs.index') }}" class="btn">Retour</a></div>
<div class="card"><h3>Produits du fournisseur</h3><table class="table"><thead><tr><th>Code</th><th>Désignation</th><th>Famille</th><th>Prix</th></tr></thead><tbody>
@forelse ($fournisseur->produits as $produit)<tr><td><a href="{{ route('produits.show', $produit->code_produit) }}">{{ $produit->code_produit }}</a></td><td>{{ $produit->designation }}</td><td>{{ $produit->famille }}</td><td>{{ number_format($produit->prix_unitaire, 2, ',', ' ') }} DH</td></tr>
@empty<tr><td colspan="4">Aucun produit.</td></tr>@endforelse
</tbody></table></div>
@endsection
