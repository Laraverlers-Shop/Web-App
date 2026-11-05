@extends('layouts.app')
@section('title', 'Ajouter un produit')
@section('content')
<div class="card"><form action="{{ route('produits.store') }}" method="POST" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
@csrf
<div><label>Désignation</label><input name="designation" value="{{ old('designation') }}" required></div>
<div><label>Prix unitaire (DH)</label><input type="number" step="0.01" min="0" name="prix_unitaire" value="{{ old('prix_unitaire') }}" required></div>
<div><label>Famille</label><select name="famille" required>@foreach (['PA','BU','FO','LI'] as $famille)<option value="{{ $famille }}" @selected(old('famille') === $famille)>{{ $famille }}</option>@endforeach</select></div>
<div><label>Fournisseur</label><select name="code_fournisseur" required>@foreach ($fournisseurs as $fournisseur)<option value="{{ $fournisseur->code_fournisseur }}" @selected(old('code_fournisseur') === $fournisseur->code_fournisseur)>{{ $fournisseur->nom_fournisseur }}</option>@endforeach</select></div>
<div style="grid-column:1/-1"><button class="btn btn-primary">Enregistrer</button> <a href="{{ route('produits.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
