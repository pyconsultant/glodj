<?php

namespace App\Filament\Resources\EglResource\Pages;

use App\Filament\Resources\EglResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEgl extends EditRecord
{
    protected static string $resource = EglResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
