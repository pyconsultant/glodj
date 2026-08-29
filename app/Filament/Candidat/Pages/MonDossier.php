<?php

namespace App\Filament\Candidat\Pages;

use App\Filament\Schemas\CandidatFormSchema;
use App\Models\Candidat;
use App\Models\Egl;
use App\Models\Ual;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Enums\UserRole;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class MonDossier extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Mon Dossier de Candidature';
    protected static string $view = 'filament.candidat.pages.mon-dossier';

    // Stocke les données du formulaire
    public ?array $data = [];
    public ?Candidat $candidat = null;

    public function mount(): void
    {
        // RÈGLE D'ISOLATION STRICTE :
        // On cherche le dossier du candidat connecté ou on en prépare un nouveau rattaché à son ID
        $user = auth()->user();
        
        $this->candidat = Candidat::firstOrCreate(
            ['user_id' => $user->id]
        );

        // Remplit le formulaire avec les données existantes
        $this->form->fill($this->candidat->toArray());
    }

    public function form(Form $form): Form
    {
        return $form->schema(
            CandidatFormSchema::make(isAdmin: false)
            )
            ->model($this->candidat)
            ->statePath('data');
    }

    // public function save(): void
    // {
    //     $data = $this->form->getState();

    //     // Met à jour uniquement la fiche du candidat connecté
    //     $this->candidat->update($data);

    //     Notification::make()
    //         ->title('Dossier mis à jour avec succès !')
    //         ->success()
    //         ->send();
    // }

    public function save(): void
    {
        // Récupère les données du formulaire
        $data = $this->form->getState();

        // 1. On met à jour le pseudo sur la relation User
        if (isset($data['user.name'])) {
            $this->candidat->user->update([
                'name' => $data['user.name'],
            ]);
        }


        // 2. On met à jour les données propres au Candidat
        $this->candidat->update($data);

        Notification::make()
            ->title('Dossier mis à jour avec succès !')
            ->success()
            ->send();
    }    
}