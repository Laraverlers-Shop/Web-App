@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Statistics Grid Cards -->
<div class="stats-grid">
    <!-- Clients Card -->
    <div class="stat-card" style="border-top: 4px solid var(--primary);">
        <div class="stat-icon" style="background: rgba(37, 99, 235, 0.1); color: var(--primary);">
            <i class="ti ti-users"></i>
        </div>
        <div>
            <h3>{{ $stats['clients'] ?? 0 }}</h3>
            <p>Clients</p>
        </div>
    </div>

    <!-- Fournisseurs Card -->
    <div class="stat-card" style="border-top: 4px solid var(--success);">
        <div class="stat-icon" style="background: rgba(22, 163, 74, 0.1); color: var(--success);">
            <i class="ti ti-truck-delivery"></i>
        </div>
        <div>
            <h3>{{ $stats['fournisseurs'] ?? 0 }}</h3>
            <p>Fournisseurs</p>
        </div>
    </div>

    <!-- Produits Card -->
    <div class="stat-card" style="border-top: 4px solid var(--warning);">
        <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning);">
            <i class="ti ti-box"></i>
        </div>
        <div>
            <h3>{{ $stats['produits'] ?? 0 }}</h3>
            <p>Produits</p>
        </div>
    </div>

    <!-- Commandes Card -->
    <div class="stat-card" style="border-top: 4px solid #7C3AED;">
        <div class="stat-icon" style="background: rgba(124, 58, 237, 0.1); color: #7C3AED;">
            <i class="ti ti-shopping-cart"></i>
        </div>
        <div>
            <h3>{{ $stats['commandes'] ?? 0 }}</h3>
            <p>Commandes</p>
        </div>
    </div>
</div>

<!-- Last Orders Section -->
<div class="card-section">
    <div class="section-header">
        <h2>Dernières commandes</h2>
        <a href="{{ route('commandes.index') }}" class="btn-primary" style="text-decoration: none; padding: 8px 16px; border-radius: 6px; color: white; font-size: 14px; display: inline-flex; align-items: center; gap: 6px;">
            <i class="ti ti-plus"></i> Ajouter un commande
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Condition</th>
                    <th>Total</th>
                    <!-- <th style="text-align: right;">Actions</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($latestCommandes ?? [] as $commande)
                <tr>
                    <td style="font-weight: 600; color: var(--primary);">{{ $commande->numero_commande ?? 'Com-00000' . $commande->id }}</td>
                    <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td>{{ $commande->client->code_client ?? 'Cli-00000X' }}</td>
                    <td>
                        @if(($commande->condition ?? 'LIV') === 'LIV')
                            <span class="badge badge-liv">LIV</span>
                        @else
                            <span class="badge badge-t30">T30</span>
                        @endif
                    </td>
                    <td style="font-weight: 600;">{{ number_format($commande->total ?? 450.00, 2) }} MAD</td>
                    <!-- <td style="text-align: right;" class="action-icons">
                        <a href="#" title="View"><i class="ti ti-eye"></i></a>
                        <a href="#" title="Edit" style="color: var(--warning);"><i class="ti ti-edit"></i></a>
                        <a href="#" title="Delete" style="color: var(--danger);"><i class="ti ti-trash"></i></a>
                    </td> -->
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #64748b; padding: 20px;">Aucune commande trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
