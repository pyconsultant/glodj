<?php

namespace App\Filament\Resources\EglResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class UalsRelationManager extends RelationManager
{
    protected static string $relationship = 'uals';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('num')
                    ->label(__('Numéro'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('UALid')
                ->label(__('Désignation'))
                ->required()
                ->maxLength(25),
                Select::make('type')
                ->label(__('Type de local'))
                ->options([
                    'chambre' => __('Chambre'),
                    'garage'  => __('Garage'),
                    'parking' => __('Parking'),
                    'cave'    => __('Cave'),
                ])
                ->default(__('Chambre'))
                ->required()
                ->native(false), // Donne un design moderne et propre au menu déroulant                
                Forms\Components\TextInput::make('surface')
                ->label(__('Surface'))
                ->numeric()                   // Force le pavé numérique et la validation d'un nombre
                ->prefix('m²')                 // Affiche le symbole € à gauche de la zone
                ->minValue(9.0)                 // Empêche les valeurs négatives
                ->step(0.5)                  // Autorise 2 décimales
                ->default(11.00),
                // ->required()
                // ->maxLength(3),
                Forms\Components\TextInput::make('loyer')
                ->label(__('Montant Loyer'))
                ->numeric()                   // Force le pavé numérique et la validation d'un nombre
                ->prefix('€')                 // Affiche le symbole € à gauche de la zone
                ->minValue(0)                 // Empêche les valeurs négatives
                ->step(0.01)                  // Autorise 2 décimales
                ->default(410.00),
//                ->maxLength(10),
                Forms\Components\TextInput::make('charges')
                ->label(__('Montant charges'))
                ->numeric()                   // Force le pavé numérique et la validation d'un nombre
                ->prefix('€')                 // Affiche le symbole € à gauche de la zone
                ->minValue(0)                 // Empêche les valeurs négatives
                ->step(0.01)                  // Autorise 2 décimales
                ->default(410.00),
                // ->required()
                // ->maxLength(10),
                Forms\Components\TextInput::make('dge')
                ->label(__('DGE'))
                ->numeric()                   // Force le pavé numérique et la validation d'un nombre
                ->prefix('€')                 // Affiche le symbole € à gauche de la zone
                ->minValue(0)                 // Empêche les valeurs négatives
                ->step(0.01)                  // Autorise 2 décimales
                ->default(410.00),
                // ->required()
                // ->maxLength(10),
                Forms\Components\TextInput::make('dgc')
                ->label(__('DGC'))
                ->numeric()                   // Force le pavé numérique et la validation d'un nombre
                ->prefix('€')                 // Affiche le symbole € à gauche de la zone
                ->minValue(0)                 // Empêche les valeurs négatives
                ->step(0.01)                  // Autorise 2 décimales
                ->default(410.00),
                // ->required()
                // ->maxLength(10),
                Toggle::make('louable')
                ->label(__('Louable individuellement ?'))
                ->helperText(__('Indique au Fisc si ce lot fait l\'objet d\'un bail séparé (ex: cave/parking loué seul)'))
                ->default(true)               // Activé par défaut
                ->inline(false),              // Aligne proprement le bouton sous le libellé

                // Forms\Components\TextInput::make('louable')
                // ->label(__('Louable'))
                // ->required()
                // ->maxLength(10),
                Forms\Components\TextInput::make('description')
                ->label(__('Description')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('num')
            ->columns([
                Tables\Columns\TextColumn::make('num')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('code')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('surface')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('loyer')
                    ->sortable()
                    ->money('EUR')
                    ->placeholder('0,00 €') // Affiche 0,00 € si le champ en base est null                    
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('charges')
                    ->sortable()
                    ->money('EUR')
                    ->placeholder('0,00 €') // Affiche 0,00 € si le champ en base est null                    
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('dge')
                    ->sortable()
                    ->money('EUR')
                    ->placeholder('0,00 €') // Affiche 0,00 € si le champ en base est null                    
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('dgc')
                    ->sortable()
                    ->money('EUR')
                    ->placeholder('0,00 €') // Affiche 0,00 € si le champ en base est null                    
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('description')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
