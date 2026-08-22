<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidatResource\Pages;
use App\Filament\Resources\CandidatResource\RelationManagers;
use App\Models\Candidat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CandidatResource extends Resource
{
    protected static ?string $model = Candidat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('prenom')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nom')
                    ->maxLength(255),
                Forms\Components\TextInput::make('adresse_mail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sexe')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_naissance'),
                Forms\Components\DatePicker::make('date_entree_souhaitee'),
                Forms\Components\TextInput::make('duree_envisagee')
                    ->numeric(),
                Forms\Components\TextInput::make('piece_identite_path')
                    ->maxLength(255),
                Forms\Components\TextInput::make('titre_sejour_path')
                    ->maxLength(255),
                Forms\Components\TextInput::make('attestation_garant_path')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statut')
                    ->required()
                    ->maxLength(255)
                    ->default('en_attente'),
                Forms\Components\Textarea::make('complement_libre')
                    ->required()
                    ->columnSpanFull(),
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
