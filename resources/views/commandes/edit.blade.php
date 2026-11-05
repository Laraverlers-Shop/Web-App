@extends('layouts.app')
@section('title', 'Modifier une commande')
@section('content')
<div class="card"><form action="{{ route('commandes.update', $commande->numero_commande) }}" method="POST" style="display:grid;gap:16px;max-width:600px">
@csrf @method('PUT')
<div><label>Date</label><input type="date" name="date_commande" value="{{ old('date_commande', \Illuminate\Support\Carbon::parse($commande->date_commande)->format('Y-m-d')) }}" required></div>
<div><label>Condition</label><select name="condition" required><option value="LIV" @selected(old('condition', $commande->condition) === 'LIV')>LIV</option><option value="T30" @selected(old('condition', $commande->condition) === 'T30')>T30</option></select></div>
<div><label>Client</label><select name="code_client" required>@foreach ($clients as $client)<option value="{{ $client->code_client }}" @selected(old('code_client', $commande->code_client) === $client->code_client)>{{ $client->nom_client }}</option>@endforeach</select></div>
<div><button class="btn btn-primary">Mettre à jour</button> <a href="{{ route('commandes.index') }}" class="btn">Annuler</a></div>
</form></div>
@endsection
