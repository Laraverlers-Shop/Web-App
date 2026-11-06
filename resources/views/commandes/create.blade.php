
@extends('layouts.app')

@section('title', 'Nouvelle commande')

@section('content')
    @include('commandes._form', [
        'action' => route('commandes.store'),
        'method' => 'POST',
    ])
@endsection
