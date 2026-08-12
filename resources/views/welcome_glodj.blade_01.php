<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Gestion Locative') }}</title>
    
    <!-- Fonts & Breeze Styles (Tailwind) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-100 min-h-screen flex flex-col justify-between">

    <!-- En-tête / Navigation -->
    <header class="w-full max-w-7xl mx-auto p-6 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">🏠 {{ config('app.name', 'CoLoc') }}</span>
        </div>

        <nav class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white transition">
                        Mon Tableau de bord
                    </a>
                    {{-- Si tu as installé Filament --}}
                    <a href="{{ url('/admin') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 font-medium transition">
                        Espace Admin (Filament)
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white transition">
                        Connexion
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 font-medium transition">
                            Créer un compte
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Contenu Principal -->
    <main class="max-w-4xl mx-auto px-6 py-12 text-center my-auto">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
            Portail de Gestion de la Colocation
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-400 mb-8 max-w-2xl mx-auto">
            Bienvenue sur la plateforme. Accédez au suivi des appartements, à la gestion des chambres et aux informations pratiques du logement.
        </p>

        <div class="flex justify-center gap-4">
            @auth
                <a href="{{ url('/admin') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-500 transition">
                    Accéder à la gestion des appartements
                </a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-500 transition">
                    Se connecter à l'espace résident
                </a>
            @endauth
        </div>
    </main>

    <!-- Pied de page -->
    <footer class="w-full max-w-7xl mx-auto p-6 text-center text-sm text-slate-500">
        {{ config('app.name') }} &copy; {{ date('Y') }} — Gestion locative simplifiée
    </footer>

</body>
</html>