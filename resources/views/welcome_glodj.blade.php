<!-- Contenu Principal -->
<style>
.container {
  display: grid;
}
body {
  width: 90%;
  max-width: 900px;
  margin: 2em auto;
  font:
    0.9em/1.2 Arial,
    Helvetica,
    sans-serif;
}

.container > div {
  border-radius: 5px;
  padding: 10px;
  background-color: rgb(207, 232, 220);
  border: 2px solid rgb(79, 185, 227);
}
.container {
  display: grid;
/*  grid-template-columns: 200px 200px 200px;*/
  grid-template-columns: 1fr 3fr 1fr 3fr 1fr;
}
</style>

<!-- <DIV style="text-align: center;border-radius: 5px;padding: 10px;color:blue;background-color: rgb(207, 232, 220);border: 2px solid rgb(79, 185, 227);"> -->
<DIV style="text-align: center;border-radius: 5px;padding: 10px;color:blue;background-color: rgb(207, 232, 220);border: 2px solid rgb(79, 185, 227);">

<h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4" >
<img src="{{ asset('images/jasmin.png') }}" style="max-width: 80px; height: auto;  alt='logo'" >               
        Le Portail de Gestion de L'Odeur Du Jasmin
    </h1>
</DIV>
    <div class="container">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div style="text-align: center;">
        <a href="{{ route('register') }}" class="group block p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:border-indigo-500 transition duration-300">
            <h2 class="text-2xl font-bold mb-2 text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                Je m'enregistre pour déposer un dossier
            </h2>
            <div class="overflow-hidden rounded-xl mb-6 bg-indigo-50 dark:bg-slate-700 p-4">
                <img src="{{ asset('images/HelpDossiers.jpg') }}" style="max-width: 100px; height: auto ; alt="Chercher une chambre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300">               
            </div>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                Découvrez nos disponibilités et créez votre dossier de candidature.
            </p>
            <span class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg group-hover:bg-indigo-500 transition">
                S'inscrire / Déposer un dossier &rarr;
            </span>
        </a>
        </div>
        <div></div> 
        <div style="text-align: center;">
        <a href="{{ route('login') }}" class="group block p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:border-indigo-500 transition duration-300">
        <h2 class="text-2xl font-bold mb-2 text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                Je suis déjà (co)locataire
            </h2> 
            <div class="overflow-hidden rounded-xl mb-6 bg-indigo-50 dark:bg-slate-700 p-4">
                <img src="{{ asset('images/JeuneFilleAvecClefs.jpg') }}" style="max-width: 100px; height: auto ; alt="Espace membre" class="h-48 w-full object-contain mx-auto group-hover:scale-105 transition duration-300">
            </div>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                Espace dédié aux colocataires, gestionnaires, exploitants et administrateurs.
            </p>
            <span class="inline-flex items-center px-4 py-2 bg-slate-800 dark:bg-slate-100 dark:text-slate-900 text-white font-medium rounded-lg group-hover:bg-slate-700 transition">
                Se connecter &rarr;
            </span>
        </a>
        </div>

        <div></div>
        <div></div>
        <div>
        <button class="bg-indigo-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
            Bouton Tailwind
        </button>
        </div>
        <div></div>
        <div>
        <button class="bg-indigo-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
            Bouton Tailwind
        </button>
        </div>
        <div></div>
    </div>


</main>