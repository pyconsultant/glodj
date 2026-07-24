<?php

namespace App\Filament\Resources\EglResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UalsRelationManager extends RelationManager
{
    protected static string $relationship = 'uals';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('num')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('UALid')
                ->required()
                ->maxLength(25),
                Forms\Components\TextInput::make('type')
                ->required()
                ->maxLength(25),
                Forms\Components\TextInput::make('surface')
                ->required()
                ->maxLength(3),
                Forms\Components\TextInput::make('loyer')
                ->required()
                ->maxLength(10),
                Forms\Components\TextInput::make('charges')
                ->required()
                ->maxLength(10),
                Forms\Components\TextInput::make('dge')
                ->required()
                ->maxLength(10),
                Forms\Components\TextInput::make('dgc')
                ->required()
                ->maxLength(10),
                Forms\Components\TextInput::make('louable')
                ->required()
                ->maxLength(10),
                Forms\Components\TextInput::make('description')
                ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('num')
            ->columns([
                Tables\Columns\TextColumn::make('num')
                    ->label(__('Appellation'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('code')
                    ->label(__('Code'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('type')
                    ->label(__('Type'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('surface')
                    ->label(__('Surface'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('loyer')
                    ->label(__('Loyer en €'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('charges')
                    ->label(__('dge'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('dge')
                    ->label(__('dge'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('dgc')
                    ->label(__('dge'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('descriptio')
                    ->label(__('Description'))
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
