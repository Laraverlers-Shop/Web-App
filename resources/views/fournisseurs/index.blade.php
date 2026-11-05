@extends('layouts.app')

@section('title', 'Fournisseurs')

@section('content')
<div class="card">
    <a href="{{ route('fournisseurs.create')}}" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
        <i class="ti ti-plus"></i> Nouveau fournisseur
    </a>

    @if ($fournisseurs->isEmpty())
    <div class="alert alert-info">
        <i class="ti ti-information"></i> Aucun fournisseur n'a été trouvé.
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Téléphone</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
            <tr>
                <td>{{ $fournisseur->code_fournisseur }}</td>
                <td>{{ $fournisseur->nom_fournisseur }}</td>
                <td>{{ $fournisseur->rue_fournisseur }}, {{ $fournisseur->code_postal_fournisseur }}</td>
                <td>{{ $fournisseur->ville_fournisseur }}</td>
                <td>{{ $fournisseur->pays_fournisseur ?? '-' }}</td>
                <td>{{ $fournisseur->tel_fournisseur ?? '-' }}</td>
                <td>{{ $fournisseur->contact_fournisseur ?? '-' }}</td>
                <td style="text-align: right; white-space: nowrap;" class="action-icons">
                    <a href="{{ route('fournisseurs.show', $fournisseur->code_fournisseur) }}" title="Voir">
                        <i class="ti ti-eye"></i>
                    </a>

                    <a href="{{ route('fournisseurs.edit', $fournisseur->code_fournisseur) }}"
                        title="Modifier" style="color: var(--warning);">
                        <i class="ti ti-edit"></i>
                    </a>

                    <form action="{{ route('fournisseurs.destroy', $fournisseur->code_fournisseur) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Supprimer"
                            style="background: none; border: none; padding: 0; cursor: pointer; color: var(--danger);"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce fournisseur ?')">
                            <i class="ti ti-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $fournisseurs->links() }}
    @endif
</div>
@endsection