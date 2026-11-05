
@extends('layouts.app')

@section('title', 'Commandes')

@section('content')
<div class="card">
    <a href="{{ route('commandes.create') }}"
       class="btn btn-primary"
       style="display: inline-block; margin-bottom: 16px;">
        <i class="ti ti-plus"></i> Nouvelle commande
    </a>

    @if ($commandes->isEmpty())
        <div class="alert alert-info">
            Aucune commande trouvée.
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Condition</th>
                        <th>Quantité totale</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{ $commande->numero_commande }}</td>
                            <td>{{ $commande->date_commande }}</td>
                            <td>{{ $commande->client?->nom_client ?? '—' }}</td>
                            <td>{{ $commande->condition }}</td>
                            <td>
                                {{ $commande->produits->sum('pivot.quantite') }}
                            </td>
                            <td>
                                {{ number_format(
                                    $commande->produits->sum(
                                        fn ($p) => $p->prix_unitaire * $p->pivot->quantite
                                    ), 2, ',', ' '
                                ) }} DH
                            </td>
                            <td class="action-icons"
                                style="white-space: nowrap;">

                                <a href="{{ route('commandes.show', $commande->numero_commande) }}"
                                   title="Voir">
                                    <i class="ti ti-eye"></i>
                                </a>

                                <a href="{{ route('commandes.edit', $commande->numero_commande) }}"
                                   title="Modifier"
                                   style="color: var(--warning);">
                                    <i class="ti ti-edit"></i>
                                </a>

                                <form action="{{ route('commandes.destroy', $commande->numero_commande) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande ?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Supprimer"
                                            style="background: none; border: none; padding: 0; cursor: pointer; color: var(--danger);">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $commandes->links() }}
    @endif
</div>
@endsection
