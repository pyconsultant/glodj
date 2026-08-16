<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tailwind & Laravel</title>
    <!-- Cette directive charge Tailwind via Vite -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md text-center border border-gray-200">
        <h1 class="text-3xl font-extrabold text-indigo-600 mb-4">
            Ça fonctionne ! 🎉
        </h1>
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <p class="text-gray-600 mb-6">
            Tailwind CSS est bien actif sur cette vue Laravel grâce à Vite.
        </p>
        <button class="bg-indigo-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
            Bouton Tailwind
        </button>
    </div> 

    <P>
    <div class="mx-auto flex max-w-sm items-center gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
    <img class="size-12 shrink-0" src="/img/jasmin.png" alt="ChitChat Logo" />
    <div>
        <div class="text-xl font-medium text-black dark:text-white">ChitChat</div>
        <p class="text-gray-500 dark:text-gray-400">You have a new message!</p>
    </div>
    </div>
    </P>
<P>
    <button class="border border-red-500 text-blue-700 hover:bg-blue-900 hover:text-white font-medium py-3 px-4 rounded-lg transition duration-200">
    Annuler
    </button>
</P>

</body>
</html>
