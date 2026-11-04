@extends('layouts.app')

@section('title', 'Ajouter un fournisseur')

@section('content')
<div class="card" style="max-width: 1000px;">
    <form action="#" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        @csrf
        <div style="grid-column: 1 / -1;">
            <label for="nom_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Nom du fournisseur</label>
            <input type="text" id="nom_fournisseur" name="nom_fournisseur" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="rue_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Rue</label>
            <input type="text" id="rue_fournisseur" name="rue_fournisseur" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="code_postal_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Code postal</label>
            <input type="text" id="code_postal_fournisseur" name="code_postal_fournisseur" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="ville_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Ville</label>
            <input type="text" id="ville_fournisseur" name="ville_fournisseur" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="pays_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Pays</label>
            <input type="text" id="pays_fournisseur" name="pays_fournisseur" style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="tel_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Téléphone</label>
            <input type="text" id="tel_fournisseur" name="tel_fournisseur" style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="contact_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Contact</label>
            <input type="text" id="contact_fournisseur" name="contact_fournisseur" style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div style="grid-column: 1 / -1; display: flex; gap: 10px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enregistrer</button>
            <a href="{{ route('fournisseurs.index') }}" class="btn" style="background: var(--border); color: var(--text);">Annuler</a>
        </div>
    </form>
</div>
@endsection
