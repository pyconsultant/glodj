<?php

/* attention : pour installer Tailwindcss V4 , vérifier d'abord la version dans package.json
si < version 4, alors 
 https://devinsto.com/blog/installer-laravel-13-et-tailwind-css-v4-le-guide-complet-avec-laravel-breeze*/

namespace App\Filament\Resources;

use App\Filament\Resources\CandidatResource\Pages;
use App\Filament\Resources\CandidatResource\RelationManagers;
use App\Enums\UserRole;
use App\Models\Candidat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tootip;
use Illuminate\Support\HtmlString;
use App\Filament\Schemas\CandidatFormSchema;
// use App\Filament\Actions;
// use App\Filament\Actions\ActionsCandidat;

use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class CandidatResource extends Resource
{
    protected static ?string $model = Candidat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = true; // (ou simplement supprimer cette ligne)

    public static function form(Form $form): Form
    {
        $isAdmin = true;
        return $form->schema(
            CandidatFormSchema::make($isAdmin)            
        ); 
    }

    public static function table(Table $table): Table
    {    
            return $table
                ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prenom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('adresse_mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_naissance')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_entree_souhaitee')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duree_envisagee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('piece_identite_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titre_sejour_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attestation_garant_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('statut')
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
//                ActionsCandidat::make('promoteToLocataire'),    
                Tables\Actions\EditAction::make(),  
                
//---------------------------------------------------------------------------------------------------------------

// 1. Bouton "Promouvoir en Locataire"
            Action::make('promoteToLocataire')
                ->label('Promouvoir')
                ->icon('heroicon-o-user-plus')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Promouvoir le candidat en locataire')
                ->modalDescription('Êtes-vous sûr de vouloir transformer ce candidat en locataire ? Cela créera son dossier locataire et gèlera la fiche candidat.')
                ->modalSubmitActionLabel('Oui, promouvoir')
                // Se masque automatiquement si le candidat est déjà promu
                ->hidden(fn (Candidat $record) => (bool) $record->is_promoted)
                ->action(function (Candidat $record) {
                    
                    // Création de l'enregistrement Locataire
                    Locataire::create([
                        'user_id'  => $record->user_id,
                        'adresse'  => $record->adresse,
                        'telephone'=> $record->telephone,
                    ]);

                    // Ajout du rôle LOCATAIRE sur le User via le bitmask
                    $user = $record->user;
                    $user->roles = $user->roles | UserRole::LOCATAIRE->value;
                    $user->save();

                    // Gel de la fiche candidat
                    $record->update([
                        'is_promoted' => true,
                    ]);

                    Notification::make()
                        ->title('Candidat promu avec succès !')
                        ->success()
                        ->send();
                }),

//---------------------------------------------------------------------------------------------------------------                

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
            'index' => Pages\ListCandidats::route('/'),
            'create' => Pages\CreateCandidat::route('/create'),
            'edit' => Pages\EditCandidat::route('/{record}/edit'),
        ];
    }
}
