@extends('layouts.app')
@section('title', 'Modifier un fournisseur')
@section('content')
<div class="card"><form action="{{ route('fournisseurs.update', $fournisseur->code_fournisseur) }}" method="POST" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
@csrf @method('PUT')
@foreach (['nom_fournisseur'=>'Nom','rue_fournisseur'=>'Rue','code_postal_fournisseur'=>'Code postal','ville_fournisseur'=>'Ville','pays_fournisseur'=>'Pays','tel_fournisseur'=>'Téléphone','contact_fournisseur'=>'Contact'] as $field=>$label)
<div><label>{{ $label }}</label><input name="{{ $field }}" value="{{ old($field, $fournisseur->$field) }}" @if (!in_array($field, ['pays_fournisseur','tel_fournisseur','contact_fournisseur'])) required @endif></div>
@endforeach
<div style="grid-column:1/-1"><button class="btn btn-primary">Mettre à jour</button> <a href="{{ route('fournisseurs.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
