@extends('layouts.app')
@section('title', 'Ajouter une commande')
@section('content')
<div class="card"><form action="{{ route('commandes.store') }}" method="POST" style="display:grid;gap:16px;max-width:600px">
@csrf
<div><label>Date</label><input type="date" name="date_commande" value="{{ old('date_commande') }}" required></div>
<div><label>Condition</label><select name="condition" required><option value="LIV" @selected(old('condition') === 'LIV')>LIV</option><option value="T30" @selected(old('condition') === 'T30')>T30</option></select></div>
<div><label>Client</label><select name="code_client" required>@foreach ($clients as $client)<option value="{{ $client->code_client }}" @selected(old('code_client') === $client->code_client)>{{ $client->nom_client }}</option>@endforeach</select></div>
<div><button class="btn btn-primary">Enregistrer</button> <a href="{{ route('commandes.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
