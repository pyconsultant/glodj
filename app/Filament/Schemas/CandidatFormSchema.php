<?php
namespace App\Filament\Schemas;

use App\Models\Egl;
use App\Models\Ual;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Actions\Action;
use App\Enums\UserRole;

class CandidatFormSchema
{
    /**
     * Retourne le schéma réutilisable du formulaire candidat
     */
    public static function make(bool $isAdmin = false): array
    {
        return [
//                 // Section 1 : informations du candidat
                Section::make(__('Vous'))
                    ->extraAttributes([
                        'class' => 'custom-green-section',
                    ])
                    ->columns(2)
                    ->description(__('Donnez-nous quelques informations sur vous.'))
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()
                    ->schema([
                        // Select::make('user.name')
                        //     ->label(__('Nom d\'utilisateur / Pseudo'))
                        //     ->relationship('user', 'name')
                        //     ->searchable()
                        //     ->preload()
                        //     ->required()
                        //     ->disabled(),
                        Select::make('user_id')
                            ->label(__('Nom d\'utilisateur / Pseudo'))
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            // ->disabled() // Rend la sélection impossible pour l'admin
                            // ->dehydrated(false) // Indique à Filament de ne pas renvoyer ce champ lors de la sauvegarde                            
                            ->required()
                            ->disabled()
                            ->label(__('Nom d\'utilisateur / Pseudo')),
                            // ->disabled($isAdmin),
                        // TextInput::make('user.name')
                        //     ->label(__('Nom d\'utilisateur / Pseudo'))
                        //     ->required()
                        //     ->maxLength(255)
                        //     // Rend le champ en lecture seule uniquement pour l'admin
                        //     ->disabled($isAdmin)
                        //     // Sécurité : empêche l'envoi de la donnée si le champ est désactivé
                        //     ->dehydrated(fn () => ! $isAdmin),
                        TextInput::make('prenom')
                            ->label(__('Prénom'))
                            ->maxLength(255),
                        TextInput::make('nom')
                            ->label(__('Nom'))
                            ->maxLength(255),
                        TextInput::make('adresse_mail')
                            ->label(__('Adresse de oourriel'))
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('telephone')
                            ->label(__('Téléphone'))
                            ->tel()
                            ->hintIcon('heroicon-m-question-mark-circle')
                            ->hintIconTooltip(__('Si votre numero est hors de France indiquez l\' indicatif du pays. Exemple Brésil : (55) XXXXX XXXX'))
                            ->maxLength(255),
                        Select::make('sexe')
                            ->label(__('Sexe'))                    
                        ->options([
                            'H' => __('Masculin'),
                            'F' => __('Féminin'),
                            'A' => __('Autre'),
                        ]),
                        DatePicker::make('date_naissance')
                            ->label(__('Date de naissance')),                        
                ]), // fin section 1

            // Section 2 : le logement
                Section::make(__('La location'))
                    ->columns(2)
                    ->description(__('Donnez-nous vos disponibités et préférences.'))
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()   // Optionnel : la section sera repliée par défaut à l'ouverture                    
                    ->schema([                    
                        DatePicker::make('date_entree_souhaitee')
                            ->label(__('Date d\'entrée souhaitée')),
                        TextInput::make('duree_envisagee')
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
                    ]), // fin section 2                    

//             // Section 3 : les pièces             
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
                            ->directory(fn ($record) => 'dossiers/candidat-' . ($record?->id ?? 'temp'))
                            ->visibility('private') // Indique à Filament que le fichier n'est pas public                                                        
                            ->disk('public') // Indique d'utiliser le stockage public
                            // ->directory('dossiers/identites')
                            // ->visibility('public')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->maxSize(5120)
                            ->openable()
                            ->downloadable(),
                            FileUpload::make('titre_sejour_path')
                            ->label('Titre de séjour (non ressortissant d\'un pays de l\'UE)')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->directory(fn ($record) => 'dossiers/candidat-' . ($record?->id ?? 'temp'))
                            ->visibility('private') // Indique à Filament que le fichier n'est pas public                                                        
                            ->maxSize(5120)
                            // ->directory('dossiers/titresejour')
                            // ->visibility('public')
                            ->openable()
                            ->downloadable(),
                            Textarea::make('complement_libre')
//                                ->required()
                                ->columnSpanFull(), // prend toute la largeur e la grid
                    ]), // fin section 3                    

                // section 4 statut du dossier
                    Section::make('Statut de votre dossier')
                    ->columns(1)
                    ->description('Consultez l\'avancement de votre dosiier ici')
                    ->collapsible() // Rend la section repliable par l'utilisateur
                    ->collapsed()   // Optionnel : la section sera repliée par défaut à l'ouverture                    
                    ->schema([       
                        Select::make('statut')
                        ->options([
                            'en_attente' => 'En attente',
                            'valide' => 'Candidature Validée',
                            'rejete' => 'Candidature Rejetée',
                        ])
                        // Désactivé si l'utilisateur n'est pas Administrateur
                        ->disabled(! auth()->user()->hasRole(UserRole::ADMINISTRATEUR)) 
                        ->label('Statut du dossier'),
                    ]), // fin section 4                    
// //            ]);
        ];
    }
}