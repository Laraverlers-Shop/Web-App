@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <div style="color: var(--text-muted);">Liste des clients</div>
        <a href="{{ route('clients.form.create') }}" class="btn btn-primary"><i class="ti ti-plus"></i></a>
    </div>
    <div style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Type</th>
                    <th>Remise</th>
                    <th style="text-align: center; width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cli-000001</td>
                    <td>SARL Atlas</td>
                    <td>Safi</td>
                    <td>PU</td>
                    <td>5 %</td>
                    <td>
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('clients.show', 'Cli-000001') }}" class="btn" style="background: var(--primary-soft); color: var(--primary); padding: 6px 8px;" title="Voir"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('clients.form.edit') }}" class="btn btn-warning" style="padding: 6px 8px;" title="Modifier"><i class="ti ti-pencil"></i></a>
                            <button class="btn btn-danger" style="padding: 6px 8px;" title="Supprimer"><i class="ti ti-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Cli-000002</td>
                    <td>Ahmed Benali</td>
                    <td>Casablanca</td>
                    <td>PA</td>
                    <td>0 %</td>
                    <td>
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('clients.show', 'Cli-000002') }}" class="btn" style="background: var(--primary-soft); color: var(--primary); padding: 6px 8px;" title="Voir"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('clients.form.edit') }}" class="btn btn-warning" style="padding: 6px 8px;" title="Modifier"><i class="ti ti-pencil"></i></a>
                            <button class="btn btn-danger" style="padding: 6px 8px;" title="Supprimer"><i class="ti ti-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
