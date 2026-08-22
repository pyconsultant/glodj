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
// use Filament\Resources\Resource\Egl;
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
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\HtmlString;


class CandidatResource extends Resource
{
    protected static ?string $model = Candidat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1 : informations du candidat
                Section::make(__('Vous'))
                    ->extraAttributes([
                        'class' => 'custom-green-section',
                    ])
                    ->columns(2)
                    ->description(__('Donnez-nous quelques informations sur vous.'))
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()
                    ->schema([
                        Select::make('user_id')
//                        Forms\Components\TextInput::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            // ->disabled() // Rend la sélection impossible pour l'admin
                            // ->dehydrated(false) // Indique à Filament de ne pas renvoyer ce champ lors de la sauvegarde                            
                            ->required()
                            ->label(__('Utilisateur rattaché')),
                        Forms\Components\TextInput::make('prenom')
                            ->label(__('Prénom'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nom')
                            ->label(__('Nom'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('adresse_mail')
                            ->label(__('Adresse de oourriel'))
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telephone')
                            ->label(__('Téléphone'))
                            ->tel()
                            ->hintIcon('heroicon-m-question-mark-circle')
                            ->hintIconTooltip(__('Si votre numero est hors de France indiquez l\' indicatif du pays. Exemple Brésil : (55) XXXXX XXXX'))
//                            ->tooltip('Si votre numero est hors de France indiquez')
                            ->maxLength(255),
                        // Forms\Components\TextInput::make('sexe')
                        //     ->maxLength(255),
                    Forms\Components\Select::make('sexe')
                            ->label(__('Sexe'))                    
                        ->options([
                            'H' => __('Masculin'),
                            'F' => __('Féminin'),
                            'A' => __('Autre'),
                        ]),
                        Forms\Components\DatePicker::make('date_naissance')
                            ->label(__('Date de naissance')),                        
                    ]), // fin section 1

            // Section 2 : le logement
                Section::make(__('La location'))
                    ->columns(2)
                    ->description(__('Donnez-nous vos disponibités et préférences.'))
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()   // Optionnel : la section sera repliée par défaut à l'ouverture                    
                    ->schema([                    
                        Forms\Components\DatePicker::make('date_entree_souhaitee')
                            ->label(__('Date d\'entrée souhaitée')),
                        Forms\Components\TextInput::make('duree_envisagee')
                            ->label(__('Durée envisagée (en mois)'))                        
                            ->numeric(),
                        Repeater::make('location')
                            ->label(__('Voeux de colocation'))
                            ->maxitems(3)
                            ->schema([
                                Select::make(__('Location'))
                                    ->options([
                                        'Lyon 8' => __('Lyon 8ème La Vanoise (Filles)'),
                                        'Bron' => __('Bron Les Essarts (Mixte)'),
                                        'Hestia' => __('Villeurbanne Hestia (Mixte)'),
                                    ])                                    
                                    ->required(),
                            ])
                            ->columns(1)

                        // Forms\Components\TextInput::make('location')                        
                        //     ->label(__('Que souhaitez-vous louer ?'))                        
                        //     ->hintIcon('heroicon-m-question-mark-circle')
                        //     ->hintIconTooltip(__('Vous pouvez mettre jusqu\'à trois choix'))
                        //     ->maxLength(255),

    //                     Repeater::make('location')
    //                         ->label('__(Vœux de colocation'))
    //                         ->maxItems(3)
    //                         ->columns(2)
    //                         ->schema([
    //                         TextInput::make()
    //     TextInput::make('name')->required(),
    //     Select::make('role')
    //         ->options([
    //             'member' => 'Member',
    //             'administrator' => 'Administrator',
    //             'owner' => 'Owner',
    //         ])
    //         ->required(),
    // ])     
    //    ->columns(2)                       

                    ]), // fin section 2                    
            // Section 3 : les pièces             
            Section::make(__('Vos documents'))
                    ->headerActions([
                            Action::make('aide_rgpd')
                                ->label('Comment sont utilisées mes données ?')
                                ->icon('heroicon-m-question-mark-circle')
                                ->modalHeading('Utilisation et protection de vos documents')
                                ->modalDescription('Vos pièces justificatives sont stockées de façon sécurisée et ne seront jamais transmises à des tiers. Elles seront supprimées en cas de refus du dossier.')
                                ->modalSubmitAction(false) // Simple modale d'information sans bouton d'envoi
                                ->modalCancelActionLabel('J\'ai compris'),
                        ])
                    ->columns(3)
                    ->description(__('Ces pièces sont facultatives à ce stade mais leur présence est un +'))
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()   // Optionnel : la section sera repliée par défaut à l'ouverture                    
                    ->schema([    
                            FileUpload::make('piece_identite_path')
                            ->label('Pièce d\'identité')
                            ->directory('dossiers/identites')
                            ->disk('public') // Indique d'utiliser le stockage public
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->visibility('public')
                            ->maxSize(5120)
                            ->openable()
                            ->downloadable(),
                    // Forms\Components\TextInput::make('piece_identite_path')
                    //  ->label(__('Pièce d\'identité'))                        
                    // ->maxLength(255),
                            FileUpload::make('titre_sejour_path')
                            ->label('Pièce d\'identité')
                            ->directory('dossiers/titresejour')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->maxSize(5120)
                            ->openable()
                            ->downloadable(),
                            // FileUpload::make('attestation_garant_path')
                            // ->label('Pièce d\'identité')
                            // ->directory('dossiers/garant')
                            // ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            // ->maxSize(5120)
                            // ->openable()
                            // ->downloadable(),
                // Forms\Components\TextInput::make('attestation_garant_path')
                //      ->label(__('Certificat Visale, ou GarantMe ou caution Garant physique ...'))
                //     ->maxLength(255),
                Forms\Components\Textarea::make('complement_libre')
                    ->required()
                    ->columnSpanFull(),
                    ]), // fin section 3                    
                // section 3
                    Section::make('Statut de votre dossier')
                    ->columns(1)
                    ->description('Consultez l\'avancement de votre dosiier ici')
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()   // Optionnel : la section sera repliée par défaut à l'ouverture                    
                    ->schema([       
                    Forms\Components\Select::make('statut')
                        ->options([
                            'en_attente' => 'En attente',
                            'valide' => 'Candidature Validée',
                            'rejete' => 'Candidature Rejetée',
                        ])
                        // Désactivé si l'utilisateur n'est pas Administrateur
                        ->disabled(! auth()->user()->hasRole(UserRole::ADMINISTRATEUR)) 
                        ->label('Statut du dossier'),
                    ]), // fin section 4                    
            ]);
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
            'index' => Pages\ListCandidats::route('/'),
            'create' => Pages\CreateCandidat::route('/create'),
            'edit' => Pages\EditCandidat::route('/{record}/edit'),
        ];
    }
}
