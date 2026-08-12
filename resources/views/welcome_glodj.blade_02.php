<!-- Contenu Principal -->
<main class="max-w-5xl mx-auto px-6 py-12 text-center my-auto">
    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
        Portail de la Colocation
    </h1>
    <p class="text-lg text-slate-600 dark:text-slate-400 mb-10 max-w-2xl mx-auto">
        Bienvenue sur la plateforme. Choisissez votre profil pour accéder à votre espace.
    </p>

    <!-- Cartes côte à côte -->
    <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        
        <!-- CARTE 1 : Recherche de chambre / Inscription -->
        <a href="{{ route('register') }}" class="group block p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:border-indigo-500 transition duration-300">
            <div class="overflow-hidden rounded-xl mb-6 bg-indigo-50 dark:bg-slate-700 p-4">
                {{-- Mets ton image ici --}}
                <!-- <img src="{{ asset('images/HelpDossiers.jpg') }}" alt="Chercher une chambre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300"> -->
                <img src="{{ asset('images/HelpDossiers.jpg') }}" style="max-width: 100px; height: auto ; alt="Chercher une chambre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300">
                

            </div>
            <h2 class="text-2xl font-bold mb-2 text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                Je cherche une chambre
            </h2>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                Découvrez nos disponibilités et créez votre dossier de candidature.
            </p>
            <span class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg group-hover:bg-indigo-500 transition">
                S'inscrire / Déposer un dossier &rarr;
            </span>
        </a>

        <!-- CARTE 2 : Déjà membre / Espace privé (Login) -->
        <a href="{{ route('login') }}" class="group block p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:border-indigo-500 transition duration-300">
            <div class="overflow-hidden rounded-xl mb-6 bg-indigo-50 dark:bg-slate-700 p-4">
                {{-- Mets ton image ici --}}
                <!--<img src="{{ asset('images/espace-membre.svg') }}" alt="Espace membre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300"> -->
                <img src="{{ asset('images/JeuneFilleAvecClefs.jpg') }}" style="max-width: 100px; height: auto ; alt="Espace membre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300">
                
            </div>
            <h2 class="text-2xl font-bold mb-2 text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                Je suis déjà membre
            </h2>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                Espace dédié aux colocataires, gestionnaires, exploitants et administrateurs.
            </p>
            <span class="inline-flex items-center px-4 py-2 bg-slate-800 dark:bg-slate-100 dark:text-slate-900 text-white font-medium rounded-lg group-hover:bg-slate-700 transition">
                Se connecter &rarr;
            </span>
        </a>

    </div>
</main>