@extends('layouts.app')

@section('title', 'Fiche fournisseur')

@section('content')
<div class="card" style="margin-bottom: 16px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
        <div>
            <h2 style="margin: 0 0 8px;">Fournisseur Alpha <span style="color: var(--text-muted); font-size: 14px;">(Fr-000001)</span></h2>
            <div>10 Avenue Commerce, 46000 Casablanca</div>
            <div style="margin-top: 6px;">Tél : 0522000000 | Contact : M. Karim</div>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('fournisseurs.form.edit') }}" class="btn btn-warning"><i class="ti ti-pencil"></i> Modifier</a>
            <a href="{{ route('fournisseurs.index') }}" class="btn" style="background: var(--border); color: var(--text);">Retour</a>
        </div>
    </div>
</div>
<div class="card">
    <h3 style="margin-top: 0;">Produits du fournisseur</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Désignation</th>
                <th>Famille</th>
                <th>Prix unitaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pr-000001</td>
                <td>Stylo bille bleu</td>
                <td>PA</td>
                <td>2.50 DH</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
