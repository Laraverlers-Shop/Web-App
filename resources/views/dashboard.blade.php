@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
    <a href="{{ route('clients.form.create') }}" class="card" style="display: flex; align-items: center; gap: 12px; transition: box-shadow 0.2s ease;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: var(--primary-soft); display: flex; align-items: center; justify-content: center; color: var(--primary);">
            <i class="ti ti-user-plus" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Nouveau client</div>
            <div style="color: var(--text-muted); font-size: 14px;">Créer un formulaire client</div>
        </div>
    </a>
    <a href="{{ route('clients.form.edit') }}" class="card" style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: #FEF3C7; display: flex; align-items: center; justify-content: center; color: var(--warning);">
            <i class="ti ti-user-edit" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Modifier client</div>
            <div style="color: var(--text-muted); font-size: 14px;">Formulaire d’édition client</div>
        </div>
    </a>
    <a href="{{ route('fournisseurs.form.create') }}" class="card" style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: var(--primary-soft); display: flex; align-items: center; justify-content: center; color: var(--primary);">
            <i class="ti ti-truck-delivery" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Nouveau fournisseur</div>
            <div style="color: var(--text-muted); font-size: 14px;">Créer un formulaire fournisseur</div>
        </div>
    </a>
    <a href="{{ route('fournisseurs.form.edit') }}" class="card" style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: #FEF3C7; display: flex; align-items: center; justify-content: center; color: var(--warning);">
            <i class="ti ti-truck" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Modifier fournisseur</div>
            <div style="color: var(--text-muted); font-size: 14px;">Formulaire d’édition fournisseur</div>
        </div>
    </a>
    <a href="{{ route('produits.form.create') }}" class="card" style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: var(--primary-soft); display: flex; align-items: center; justify-content: center; color: var(--primary);">
            <i class="ti ti-box" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Nouveau produit</div>
            <div style="color: var(--text-muted); font-size: 14px;">Créer un formulaire produit</div>
        </div>
    </a>
    <a href="{{ route('produits.form.edit') }}" class="card" style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: #FEF3C7; display: flex; align-items: center; justify-content: center; color: var(--warning);">
            <i class="ti ti-pencil" style="font-size: 24px;"></i>
        </div>
        <div>
            <div style="font-weight: 500;">Modifier produit</div>
            <div style="color: var(--text-muted); font-size: 14px;">Formulaire d’édition produit</div>
        </div>
    </a>
</div>
@endsection
