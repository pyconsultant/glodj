<?php

namespace App\Filament\Resources\EglResource\Pages;

use App\Filament\Resources\EglResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEgls extends ListRecords
{
    protected static string $resource = EglResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
