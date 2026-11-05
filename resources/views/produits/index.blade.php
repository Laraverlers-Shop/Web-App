@extends('layouts.app')

@section('title', 'Produits')

@section('content')
<div class="card">
    <a href="{{ route('produits.create')}}" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
        <i class="ti ti-plus"></i> Nouveau produit
    </a>

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
                <td style="text-align: right; white-space: nowrap;" class="action-icons">
                    <a href="{{ route('produits.show', $produit->code_produit) }}" title="Voir">
                        <i class="ti ti-eye"></i>
                    </a>

                    <a href="{{ route('produits.edit', $produit->code_produit) }}"
                        title="Modifier" style="color: var(--warning);">
                        <i class="ti ti-edit"></i>
                    </a>

                    <form action="{{ route('produits.destroy', $produit->code_produit) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Supprimer"
                            style="background: none; border: none; padding: 0; cursor: pointer; color: var(--danger);"
                            onclick="return confirm('Voulez-vous vraiment supprimer ?')">
                            <i class="ti ti-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $produits->links() }}
    @endif
</div>
@endsection