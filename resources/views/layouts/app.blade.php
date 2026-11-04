<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Gestion des commandes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>

<body>
    <div class="app">

        <aside class="sidebar">
            <div class="brand"><i class="ti ti-packages"></i> Papeterie</div>
            <nav>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="ti ti-layout-dashboard"></i> Dashboard
                </a>
                <a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">
                    <i class="ti ti-users"></i> Clients
                </a>
                <a href="{{ route('fournisseurs.index') }}" class="{{ request()->routeIs('fournisseurs.*') ? 'active' : '' }}">
                    <i class="ti ti-truck-delivery"></i> Fournisseurs
                </a>
                <a href="{{ route('produits.index') }}" class="{{ request()->routeIs('produits.*') ? 'active' : '' }}">
                    <i class="ti ti-box"></i> Produits
                </a>
                <a href="{{ route('commandes.index') }}" class="{{ request()->routeIs('commandes.*') ? 'active' : '' }}">
                    <i class="ti ti-shopping-cart"></i> Commandes
                </a>

                
            </nav>

            <!-- Logout Button -->

            <div class="sidebar-footer">
                <div class="user-info">
                    <i class="ti ti-user-circle" style="font-size: 24px;"></i>
                    <span class="user-name">{{ Auth::user()->name ?? 'Utilisateur' }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-sidebar-logout" title="Déconnexion">
                        <i class="ti ti-logout"></i>
                    </button>
                </form>
            </div>

        </aside>

        <main class="main">
            <h1 class="page-title">@yield('title', 'Dashboard')</h1>

            @if (session('success'))
            <div class="alert alert-success"><i class="ti ti-circle-check"></i> {{ session('success') }}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <i class="ti ti-alert-circle"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>

    </div>
</body>

</html>
