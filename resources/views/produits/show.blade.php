@extends('layouts.app')
@section('title', 'Fiche produit')
@section('content')
<div class="card"><h2>{{ $produit->designation }} <small>({{ $produit->code_produit }})</small></h2>
<p>Famille : {{ $produit->famille }} | Prix unitaire : {{ number_format($produit->prix_unitaire, 2, ',', ' ') }} DH</p>
<p>Fournisseur : {{ $produit->fournisseur->nom_fournisseur }}</p>
<a href="{{ route('produits.edit', $produit->code_produit) }}" class="btn btn-warning">Modifier</a> <a href="{{ route('produits.index') }}" class="btn">Retour</a></div>
@endsection
