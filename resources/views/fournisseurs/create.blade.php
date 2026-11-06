@extends('layouts.app')
@section('title', 'Ajouter un fournisseur')
@section('content')
<div class="card"><form action="{{ route('fournisseurs.store') }}" method="POST" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
@csrf
@foreach (['nom_fournisseur'=>'Nom','rue_fournisseur'=>'Rue','code_postal_fournisseur'=>'Code postal','ville_fournisseur'=>'Ville','pays_fournisseur'=>'Pays','tel_fournisseur'=>'Téléphone','contact_fournisseur'=>'Contact'] as $field=>$label)
<div><label>{{ $label }}</label><input name="{{ $field }}" value="{{ old($field) }}" @if (!in_array($field, ['pays_fournisseur','tel_fournisseur','contact_fournisseur'])) required @endif></div>
@endforeach
<div style="grid-column:1/-1"><button class="btn btn-primary">Enregistrer</button> <a href="{{ route('fournisseurs.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
