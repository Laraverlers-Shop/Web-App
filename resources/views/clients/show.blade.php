@extends('layouts.app')

@section('title', 'Fiche client')

@section('content')
<div class="card" style="margin-bottom: 16px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
        <div>
            <h2 style="margin: 0 0 8px;">SARL Atlas <span style="color: var(--text-muted); font-size: 14px;">(Cli-000001)</span></h2>
            <div>123 Rue Principale, 46000 Safi</div>
            <div style="margin-top: 6px;">Type : PU | Remise : 5 %</div>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('clients.form.edit') }}" class="btn btn-warning"><i class="ti ti-pencil"></i> Modifier</a>
            <a href="{{ route('clients.index') }}" class="btn" style="background: var(--border); color: var(--text);">Retour</a>
        </div>
    </div>
</div>
<div class="card">
    <h3 style="margin-top: 0;">Commandes du client</h3>
    <table class="table">
        <thead>
            <tr>
                <th>N° Commande</th>
                <th>Date</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Com-000001</td>
                <td>2026-10-15</td>
                <td>LIV</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
