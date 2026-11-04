@extends('layouts.app')

@section('title', 'Fournisseurs')

@section('content')
    <div class="card">
        <a href="#" class="btn btn-primary" style="margin-bottom: 16px; display: inline-block;">
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
