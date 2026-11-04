@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <div class="card">
        <a href="#" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
            <i class="ti ti-plus"></i> Nouveau client
        </a>

        @if (session('success'))
        <div class="alert alert-success"><i class="ti ti-circle-check"></i> {{ session('success') }}</div>
        @endif

        @if ($clients->isEmpty())
            <div class="alert alert-info">
                <i class="ti ti-information"></i> Aucun client n'a été trouvé.
            </div>
        @else
        <table class="table">
            <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Type</th>
                <th>Remise</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->code_client }}</td>
                <td>{{ $client->nom_client }}</td>
                <td>{{ $client->rue_client }}, {{ $client->code_postal_client }}</td>
                <td>{{ $client->ville_client }}</td>
                <td>{{ $client->type_client }}</td>
                <td>{{ $client->remise_speciale }} %</td>
                <td>
                    <a href="#" class="btn btn-primary" style="padding: 4px 8px; font-size: 12px;">Voir</a>
                    <a href="#" class="btn btn-warning" style="padding: 4px 8px; font-size: 12px;">Modifier</a>
                    <a href="#" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;">Supprimer</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
