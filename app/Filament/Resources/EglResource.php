<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EglResource\Pages;
use App\Filament\Resources\EglResource\RelationManagers;
use App\Models\Egl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EglResource extends Resource
{
    protected static ?string $model = Egl::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Ne pas demander la saisie de id qui est un champ auto-incémentée
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->maxLength(5),
                Forms\Components\TextInput::make('code')
                    ->label('Code de l\'appartement')
                    ->required() // ou ->nullable() selon ton besoin
                    ->maxLength(10)
                    ->unique(ignoreRecord: true), // Filament gère même l'unicité automatiquement !                    
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('adresse')
                    ->required()
                    ->maxLength(35),
                Forms\Components\TextInput::make('complement')
                    ->maxLength(35),
                Forms\Components\TextInput::make('codepostal')
                    ->required()
                    ->maxLength(5),
                Forms\Components\TextInput::make('commune')
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('codepays')
                    ->required()
                    ->maxLength(3),
                Forms\Components\TextInput::make('pays')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('commentaire')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // pas la peine là non plus d'afficcher l'id de l'appartement
                // Tables\Columns\TextColumn::make('id')
                // ->label(__('Nom du bien')) // Utilise la traduction Laravel
                //     ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('nom')
                    ->sortable() // Permet de chercher par code dans la barre de recherche                        
                    ->searchable(),
                Tables\Columns\TextColumn::make('adresse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('complement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codepostal')
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    ,
                Tables\Columns\TextColumn::make('commune')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codepays')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pays')
                    ->sortable()    
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEgls::route('/'),
            'create' => Pages\CreateEgl::route('/create'),
            'edit' => Pages\EditEgl::route('/{record}/edit'),
        ];
    }
}
