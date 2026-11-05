@extends('layouts.app')
@section('title', 'Ajouter un client')
@section('content')
<div class="card" style="max-width: 1000px;">
    <form action="{{ route('clients.store') }}" method="POST" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px;">
        @csrf
        <div><label>Nom du client</label><input name="nom_client" value="{{ old('nom_client') }}" required></div>
        <div><label>Rue</label><input name="rue_client" value="{{ old('rue_client') }}" required></div>
        <div><label>Code postal</label><input name="code_postal_client" value="{{ old('code_postal_client') }}" required></div>
        <div><label>Ville</label><input name="ville_client" value="{{ old('ville_client') }}" required></div>
        <div><label>Type de client</label><select name="type_client" required>
            @foreach (['PU' => 'Secteur public', 'PA' => 'Particulier', 'LI' => 'Profession libérale', 'AS' => 'Association', 'DI' => 'Divers'] as $code => $label)
                <option value="{{ $code }}" @selected(old('type_client') === $code)>{{ $code }} - {{ $label }}</option>
            @endforeach
        </select></div>
        <div><label>Remise spéciale (%)</label><input type="number" name="remise_speciale" min="0" max="100" value="{{ old('remise_speciale', 0) }}" required></div>
        <div style="grid-column:1/-1;display:flex;gap:10px"><button class="btn btn-primary">Enregistrer</button><a href="{{ route('clients.index') }}" class="btn">Annuler</a></div>
    </form>
</div>
@endsection
