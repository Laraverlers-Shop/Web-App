@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<div class="card">
    <a href="{{ route('clients.create')}}" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
        <i class="ti ti-plus"></i> Nouveau client
    </a>

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
                <td style="text-align: right; white-space: nowrap;" class="action-icons">
                    <a href="{{ route('clients.show', $client->code_client) }}" title="Voir">
                        <i class="ti ti-eye"></i>
                    </a>

                    <a href="{{ route('clients.edit', $client->code_client) }}"
                        title="Modifier" style="color: var(--warning);">
                        <i class="ti ti-edit"></i>
                    </a>

                    <form action="{{ route('clients.destroy', $client->code_client) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Supprimer"
                            style="background: none; border: none; cursor: pointer; color: var(--danger); font-size: inherit; padding: 0;"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')">
                            <i class="ti ti-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clients->links() }}
    @endif
</div>
@endsection