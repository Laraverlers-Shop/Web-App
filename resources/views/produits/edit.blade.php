@extends('layouts.app')
@section('title', 'Modifier un produit')
@section('content')
<div class="card"><form action="{{ route('produits.update', $produit->code_produit) }}" method="POST" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
@csrf @method('PUT')
<div><label>Désignation</label><input name="designation" value="{{ old('designation', $produit->designation) }}" required></div>
<div><label>Prix unitaire (DH)</label><input type="number" step="0.01" min="0" name="prix_unitaire" value="{{ old('prix_unitaire', $produit->prix_unitaire) }}" required></div>
<div><label>Famille</label><select name="famille" required>@foreach (['PA','BU','FO','LI'] as $famille)<option value="{{ $famille }}" @selected(old('famille', $produit->famille) === $famille)>{{ $famille }}</option>@endforeach</select></div>
<div><label>Fournisseur</label><select name="code_fournisseur" required>@foreach ($fournisseurs as $fournisseur)<option value="{{ $fournisseur->code_fournisseur }}" @selected(old('code_fournisseur', $produit->code_fournisseur) === $fournisseur->code_fournisseur)>{{ $fournisseur->nom_fournisseur }}</option>@endforeach</select></div>
<div style="grid-column:1/-1"><button class="btn btn-primary">Mettre à jour</button> <a href="{{ route('produits.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
