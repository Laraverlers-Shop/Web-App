@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <div class="card">
        <a href="#" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
            <i class="ti ti-plus"></i> Nouveau produit
        </a>

        @if (session('success'))
        <div class="alert alert-success"><i class="ti ti-circle-check"></i> {{ session('success') }}</div>
        @endif

        @if ($produits->isEmpty())
            <div class="alert alert-info">
                <i class="ti ti-information"></i> Aucun produit n'a été trouvé.
            </div>
        @else
        <table class="table">
            <thead>
            <tr>
                <th>Code</th>
                <th>Désignation</th>
                <th>Prix unitaire</th>
                <th>Famille</th>
                <th>Fournisseur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($produits as $produit)
            <tr>
                <td>{{ $produit->code_produit }}</td>
                <td>{{ $produit->designation }}</td>
                <td>{{ number_format($produit->prix_unitaire, 2, ',', ' ') }} DH</td>
                <td>{{ $produit->famille }}</td>
                <td>{{ $produit->fournisseur->nom_fournisseur ?? '-' }}</td>
                <td>
                    <a href="#" class="btn btn-primary" style="padding: 4px 8px; font-size: 12px;">Voir</a>
                    <a href="#" class="btn btn-warning" style="padding: 4px 8px; font-size: 12px;">Modifier</a>
                    <a href="#" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;">Supprimer</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $produits->links() }}
        @endif
    </div>
@endsection
