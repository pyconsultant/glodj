<?php

namespace App\Filament\Resources\CandidatResource\Pages;

use App\Filament\Resources\CandidatResource;
use Filament\Actions;
// use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;


class EditCandidat extends EditRecord
{
    protected static string $resource = CandidatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('demandeComplements')
                ->label('Demande de compléments')
                ->icon('heroicon-o-user-plus')
                ->disabled()//provisoire, en vue évolution
                ->color('success'),
                // ->requiresConfirmation(),
            Actions\Action::make('genererBail')
                ->label('Générer le bail')
                ->icon('heroicon-o-user-plus')
                ->color('success')
                ->modalHeading('Générer le bail ?')
                ->modalDescription('Cette opération va générer un bail en fonction des informations connues pour ce candidat. Êtes-vous sûr ?')
                ->modalSubmitActionLabel('Oui, générer')
                ->action(function ($record) {
                    dump();
                    $z = 5;
                    $x = $z + 3;
                })
                ,    
            Actions\DeleteAction::make(),
        ];
    }
}
