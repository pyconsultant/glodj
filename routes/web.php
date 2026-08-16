<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;

Route::get('/', function () {
    return view('welcome_glodj');
});

Route::get('/tt', function () {
    return view('tailwind');
});

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
