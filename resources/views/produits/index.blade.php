@extends('layouts.app')

@section('title', 'Produits')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <div style="color: var(--text-muted);">Liste des produits</div>
        <a href="{{ route('produits.form.create') }}" class="btn btn-primary"><i class="ti ti-plus"></i></a>
    </div>
    <div style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Désignation</th>
                    <th>Famille</th>
                    <th>Prix unitaire</th>
                    <th>Fournisseur</th>
                    <th style="text-align: center; width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pr-000001</td>
                    <td>Stylo bille bleu</td>
                    <td>PA</td>
                    <td>2.50 DH</td>
                    <td>Fournisseur Alpha</td>
                    <td>
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('produits.show', 'Pr-000001') }}" class="btn" style="background: var(--primary-soft); color: var(--primary); padding: 6px 8px;" title="Voir"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('produits.form.edit') }}" class="btn btn-warning" style="padding: 6px 8px;" title="Modifier"><i class="ti ti-pencil"></i></a>
                            <button class="btn btn-danger" style="padding: 6px 8px;" title="Supprimer"><i class="ti ti-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
