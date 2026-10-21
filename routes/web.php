<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

/*
    Récupère l'utilisateur courant et retourne ses différents rôles sous forme d'un tableau
*/
function getRoles()
{
    $user = Auth::user();
    $roles= [];
    if ($user->roles & UserRole::ADMINISTRATEUR->value)
        $roles[] = __(UserRole::ADMINISTRATEUR->label());
    if ($user->roles & UserRole::GESTIONNAIRE->value)
        $roles[] = __(UserRole::GESTIONNAIRE->label());
    if ($user->roles & UserRole::EXPLOITANT->value)
        $roles[] = __(UserRole::EXPLOITANT->label());
    if ($user->roles & UserRole::COMPTABLE->value)
        $roles[] = __(UserRole::COMPTABLE->label());
    if ($user->roles & UserRole::ANALYSTE->value)
        $roles[] = __(UserRole::ANALYSTE->label());
    if ($user->roles & UserRole::LOCATAIRE->value)
        $roles[] = __(UserRole::LOCATAIRE->label());
    if ($user->roles & UserRole::GARANT->value)
        $roles[] = __(UserRole::GARANT->label());
    if ($user->roles & UserRole::CANDIDAT->value)
        $roles[] = __(UserRole::CANDIDAT->label());
    if ($user->roles & UserRole::INVITE->value)
        $roles[] = __(UserRole::INVITE->label());    
    return $roles;
}

Route::get('/', function () {
    return view('welcome_glodj');
});

Route::get('/op', function () {
    return view('operateur');
});

Route::get('/tt', function () {
    return view('tailwind');
})->name('tailwind');

Route::get('/hu', function () {
    return view('homeuser'); // Attention au chemin de ta vue (voir point 2)
})->middleware(['auth'])->name('hu');

Route::get('/mm', function () {
    $user = Auth::user();

    $roles = getRoles();
    return view('mainmenu',['nom'=>'Charly','roles'=>$roles]); // Attention au chemin de ta vue (voir point 2)
    
 })->middleware(['auth'])->name('mm');

Route::get('/test', function () {
//    return 'Les sanglots longs '.intval($role);
$value = (string) (UserRole::GARANT->value);
//    return (string) (UserRole::GARANT->value);    
    $role = UserRole::GARANT;
    return $role->label();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
