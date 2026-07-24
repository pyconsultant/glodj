<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EglResource\RelationManagers\UalsRelationManager;
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

    // Nom dans le menu de navigation
    public static function getNavigationLabel(): string
    {
        return __('Entités Globales');
    }

    // Nom au singulier (ex: "Créer une Entité Globale")
    public static function getModelLabel(): string
    {
        return __('Entité Globale');
    }

    // Nom au pluriel (ex: titre de la liste)
    public static function getPluralModelLabel(): string
    {
        return __('Entités Globales');
    }

    public static function form(Form $form): Form
    {
        // pour l'affichage de saisie (création/édition)
        return $form
            ->schema([
                // Ne pas demander la saisie de id qui est un champ auto-incémentée
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->maxLength(5),
                Forms\Components\TextInput::make('code')
                    ->label(__('Code de l\'appartement'))
                    ->required() // ou ->nullable() selon ton besoin
                    ->maxLength(10)
                    ->unique(ignoreRecord: true), // Filament gère même l'unicité automatiquement !                    
                Forms\Components\TextInput::make('nom')
                    ->label(__('Désignation'))
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('adresse')
                    ->label(__('Adresse'))
                    ->required()
                    ->maxLength(35),
                Forms\Components\TextInput::make('complement')
                    ->label(__('Complément'))
                    ->maxLength(35),
                Forms\Components\TextInput::make('codepostal')
                    ->label(__('Code Postal'))
                    ->required()
                    ->maxLength(5),
                Forms\Components\TextInput::make('commune')
                    ->label(__('Commune'))
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('codepays')
                    ->label(__('Code Pays'))
                    ->required()
                    ->maxLength(3),
                Forms\Components\TextInput::make('pays')
                    ->label(__('Pays'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('commentaire')
                    ->label(__('Commentaire'))
                    ->columnSpanFull(),
            ]);
    }

    // pour l'affichage en colonnes
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // pas la peine là non plus d'afficcher l'id de l'appartement
                // Tables\Columns\TextColumn::make('id')
                // ->label(__('Nom du bien')) // Utilise la traduction Laravel
                //     ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->label(__('Code'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    
                Tables\Columns\TextColumn::make('nom')
                    ->label(__('Désignation'))
                    ->sortable() // Permet de chercher par code dans la barre de recherche                        
                    ->searchable(),
                Tables\Columns\TextColumn::make('adresse')
                    ->label(__('Adresse'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('complement')
                    ->label(__('Complément'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('codepostal')
                    ->label(__('Code Postal'))
                    ->sortable()
                    ->searchable(), // Permet de chercher par code dans la barre de recherche                    ,
                Tables\Columns\TextColumn::make('commune')
                    ->label(__('Commune'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codepays')
                    ->label(__('Code Pays'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pays')
                    ->label(__('Pays'))
                    ->sortable()    
                    ->searchable(),
                Tables\Columns\TextColumn::make('image_path')
                    ->label(__('Photo')),
//                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->striped()
            // On applique la classe CSS d'alternance sur CHAQUE ligne,
            // et le navigateur l'applique uniquement 1 ligne sur 2 (even) !
//            ->recordClasses(fn () => '[&:nth-child(even)]:bg-blue-50/70 dark:[&:nth-child(even)]:bg-blue-900/20')
//            ->recordClasses(fn () => '[&:nth-child(even)]:bg-blue dark:[&:nth-child(even)]:bg-blue')
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
            // 2. Déclare le Relation Manager ici :
            UalsRelationManager::class,
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
