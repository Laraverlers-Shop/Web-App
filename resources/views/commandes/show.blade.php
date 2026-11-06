
@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('content')
<div class="card" style="margin-bottom: 16px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
        <div>
            <h2 style="margin: 0 0 16px;">
                Commande {{ $commande->numero_commande }}
            </h2>

            <p>
                <strong>Client :</strong>
                {{ $commande->client?->nom_client ?? '—' }}
            </p>

            <p>
                <strong>Code client :</strong>
                {{ $commande->code_client }}
            </p>

            <p>
                <strong>Date :</strong>
                {{ $commande->date_commande }}
            </p>

            <p>
                <strong>Condition :</strong>
                {{ $commande->condition }}
            </p>
        </div>

        <div style="display: flex; gap: 10px;">
            <a href="{{ route('commandes.edit', $commande->numero_commande) }}"
               class="btn btn-warning">
                <i class="ti ti-edit"></i> Modifier
            </a>

            <a href="{{ route('commandes.index') }}"
               class="btn"
               style="background: var(--border); color: var(--text);">
                Retour
            </a>
        </div>
    </div>
</div>

<div class="card">
    <h3 style="margin-top: 0;">Produits commandés</h3>

    @if ($commande->produits->isEmpty())
        <div class="alert alert-info">
            Aucun produit dans cette commande.
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code produit</th>
                        <th>Désignation</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commande->produits as $produit)
                        <tr>
                            <td>{{ $produit->code_produit }}</td>
                            <td>{{ $produit->designation }}</td>
                            <td>{{ $produit->pivot->quantite }}</td>
                            <td>
                                {{ number_format($produit->prix_unitaire, 2, ',', ' ') }} DH
                            </td>
                            <td>
                                {{ number_format(
                                    $produit->prix_unitaire * $produit->pivot->quantite,
                                    2, ',', ' '
                                ) }} DH
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 style="text-align: right; margin-top: 20px;">
            Total :
            {{ number_format(
                $commande->produits->sum(
                    fn ($p) => $p->prix_unitaire * $p->pivot->quantite
                ), 2, ',', ' '
            ) }} DH
        </h3>
    @endif
</div>
@endsection
