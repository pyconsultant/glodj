<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <h1><img src="{{ asset('images/jasmin.png') }}" alt="LODJ logo" style="width: 60px; height: auto;"> Espace de gestion LODJ</h1>


    <div>@yield('content')</div>
</body>
</html> -->

<!-- {{-- resources/views/layouts/app.blade.php --}} -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Espace perso')</title>
    <!-- Injection des styles Vite/Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="bg-green-400 rounded-lg text-white p-4 shadow flex items-center justify-center gap-4">
    <img src="{{ asset('images/jasmin.png') }}" alt="LODJ logo" style="width: 60px; height: auto;" class="w-12 h-12 object-cover"/> 
    <p>Bonjour {{ auth()->user()->name }}</p>
</div>  
  
    <main>
        @yield('content')
    </main>

    <footer>&copy; {{ date('Y') }}</footer>
</body>
</html>