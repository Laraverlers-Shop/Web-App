@extends('layouts.app')

@section('title', 'Modifier la commande ' . $commande->numero_commande)

@section('content')
    @include('commandes._form', [
        'action' => route('commandes.update', $commande),
        'method' => 'PUT',
    ])
@endsection
