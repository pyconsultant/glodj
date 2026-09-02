// import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

// export default {
//     presets: [preset],
//     content: [
//         './app/Filament/Candidat/**/*.php',
//         './resources/views/filament/candidat/**/*.blade.php',
//         './vendor/filament/**/*.blade.php',
//     ],
// }

import presets from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [presets],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            // Ex: ajouter une couleur personnalisée
            colors: {
                jasmin: {
                    50: '#fdf8f6',
                    500: '#e07a5f',
                    900: '#3d405b',
                },
            },
        },
    },
}