@extends('layouts.app')
@section('title', 'Commandes')
@section('content')
<div class="card"><a href="{{ route('commandes.create') }}" class="btn btn-primary" style="display:inline-block;margin-bottom:16px">Nouvelle commande</a>
@if ($commandes->isEmpty())<div class="alert alert-info">Aucune commande trouvée.</div>@else
<table class="table"><thead><tr><th>Numéro</th><th>Date</th><th>Client</th><th>Condition</th><th>Actions</th></tr></thead><tbody>
@foreach ($commandes as $commande)<tr><td>{{ $commande->numero_commande }}</td><td>{{ $commande->date_commande }}</td><td>{{ $commande->client->nom_client }}</td><td>{{ $commande->condition }}</td><td>
<a href="{{ route('commandes.show', $commande->numero_commande) }}">Voir</a> <a href="{{ route('commandes.edit', $commande->numero_commande) }}">Modifier</a>
<form action="{{ route('commandes.destroy', $commande->numero_commande) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button onclick="return confirm('Supprimer cette commande ?')">Supprimer</button></form>
</td></tr>@endforeach
</tbody></table>{{ $commandes->links() }}@endif
</div>
@endsection
