@extends('layouts.app')

@section('title', 'Ajouter un client')

@section('content')
<div class="card" style="max-width: 1000px;">
    <form action="#" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        @csrf
        <div>
            <label for="nom_client" style="display: block; margin-bottom: 6px; font-weight: 500;">Nom du client</label>
            <input type="text" id="nom_client" name="nom_client" class="input" placeholder="Ex: SARL Atlas" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="rue_client" style="display: block; margin-bottom: 6px; font-weight: 500;">Rue</label>
            <input type="text" id="rue_client" name="rue_client" class="input" placeholder="Adresse" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="code_postal_client" style="display: block; margin-bottom: 6px; font-weight: 500;">Code postal</label>
            <input type="text" id="code_postal_client" name="code_postal_client" class="input" placeholder="46000" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="ville_client" style="display: block; margin-bottom: 6px; font-weight: 500;">Ville</label>
            <input type="text" id="ville_client" name="ville_client" class="input" placeholder="Safi" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="type_client" style="display: block; margin-bottom: 6px; font-weight: 500;">Type de client</label>
            <select id="type_client" name="type_client" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
                <option value="" disabled selected>Choisir un type</option>
                <option value="PU">PU - Secteur public</option>
                <option value="PA">PA - Particulier</option>
                <option value="LI">LI - Profession libérale</option>
                <option value="AS">AS - Association</option>
                <option value="DI">DI - Divers</option>
            </select>
        </div>
        <div>
            <label for="remise_speciale" style="display: block; margin-bottom: 6px; font-weight: 500;">Remise spéciale (%)</label>
            <input type="number" id="remise_speciale" name="remise_speciale" min="0" max="100" value="0" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div style="grid-column: 1 / -1; display: flex; gap: 10px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enregistrer</button>
            <a href="{{ route('clients.index') }}" class="btn" style="background: var(--border); color: var(--text);">Annuler</a>
        </div>
    </form>
</div>
@endsection
