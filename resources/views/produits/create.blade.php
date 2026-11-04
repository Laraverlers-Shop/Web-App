@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
<div class="card" style="max-width: 1000px;">
    <form action="#" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        @csrf
        <div style="grid-column: 1 / -1;">
            <label for="designation" style="display: block; margin-bottom: 6px; font-weight: 500;">Désignation</label>
            <input type="text" id="designation" name="designation" placeholder="Nom ou description du produit" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="prix_unitaire" style="display: block; margin-bottom: 6px; font-weight: 500;">Prix unitaire (DH)</label>
            <input type="number" step="0.01" min="0" id="prix_unitaire" name="prix_unitaire" placeholder="0.00" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div>
            <label for="famille" style="display: block; margin-bottom: 6px; font-weight: 500;">Famille</label>
            <select id="famille" name="famille" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
                <option value="" disabled selected>Choisir une famille</option>
                <option value="PA">PA - Papeterie</option>
                <option value="BU">BU - Bureautique</option>
                <option value="FO">FO - Fournitures</option>
                <option value="LI">LI - Librairie</option>
            </select>
        </div>
        <div>
            <label for="code_fournisseur" style="display: block; margin-bottom: 6px; font-weight: 500;">Fournisseur</label>
            <select id="code_fournisseur" name="code_fournisseur" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border); border-radius: 10px;">
                <option value="" disabled selected>Choisir un fournisseur</option>
                <option value="Fr-000001">Fr-000001 - Fournisseur Alpha</option>
                <option value="Fr-000002">Fr-000002 - Fournisseur Beta</option>
            </select>
        </div>
        <div style="grid-column: 1 / -1; display: flex; gap: 10px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enregistrer</button>
            <a href="{{ route('produits.index') }}" class="btn" style="background: var(--border); color: var(--text);">Annuler</a>
        </div>
    </form>
</div>
@endsection
