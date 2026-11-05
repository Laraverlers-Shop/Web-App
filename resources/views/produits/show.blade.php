@extends('layouts.app')

@section('title', 'Fiche produit')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
        <div>
            <h2 style="margin: 0 0 8px;">Stylo bille bleu <span style="color: var(--text-muted); font-size: 14px;">(Pr-000001)</span></h2>
            <div>Famille : PA | Prix unitaire : 2.50 DH</div>
            <div style="margin-top: 6px;">Fournisseur : Fournisseur Alpha (Fr-000001)</div>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="#" class="btn btn-warning"><i class="ti ti-pencil"></i> Modifier</a>
            <a href="#" class="btn" style="background: var(--border); color: var(--text);">Retour</a>
        </div>
    </div>
</div>
@endsection
