<?php

namespace App\Filament\Actions;

use App\Enums\UserRole;
use App\Models\Candidat;
// use App\Models\Locataire;
use Filament\Actions\Action; // Import générique d'action Filament
use Filament\Notifications\Notification;

class ActionsCandidat
{
    /**
     * Génère l'action configurée pour la promotion d'un candidat.
     */
    public static function make(string $name = 'promoteToLocataire'): Action
    {
        return Action::make($name)
            ->label('demandeComplements')
            ->icon('heroicon-o-user-plus')
            ->color('success')
            ->requiresConfirmation();
    //         ->modalHeading('Promouvoir le candidat en locataire')
    //         ->modalDescription('Êtes-vous sûr de vouloir transformer ce candidat en locataire ? Cela créera son dossier locataire et gèlera la fiche candidat.')
    //         ->modalSubmitActionLabel('Oui, promouvoir')
    //         // Se masque si le candidat passé à l'action est déjà promu
    //         ->hidden(function ($record) {
    //             return $record ? (bool) $record->is_promoted : false;
    //         })
    //         ->action(function ($record) {
    //             // Au cas où $record n'est pas passé automatiquement (ex: sur une Page)
    //             if (! $record) {
    //                 return;
    //             }

    //             // 1. Création de l'enregistrement Locataire
    //             Locataire::create([
    //                 'user_id'   => $record->user_id,
    //                 'adresse'   => $record->adresse,
    //                 'telephone' => $record->telephone,
    //             ]);

    //             // 2. Ajout du rôle LOCATAIRE sur le User via le bitmask
    //             if ($record->user) {
    //                 $user = $record->user;
    //                 $user->roles = $user->roles | UserRole::LOCATAIRE->value;
    //                 $user->save();
    //             }

    //             // 3. Gel de la fiche candidat
    //             $record->update([
    //                 'is_promoted' => true,
    //             ]);

    //             Notification::make()
    //                 ->title('Candidat promu avec succès !')
    //                 ->success()
    //                 ->send();
    //         });
    }
}