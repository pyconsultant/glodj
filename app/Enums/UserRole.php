<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMINISTRATEUR = 1;
    case OPERATEUR = 2;
    case EXPLOITANT = 4;
    case COMPTABLE = 8;
    case ANALYSTE = 16;
    case LOCATAIRE = 32;
    case GARANT = 64;
    case CANDIDAT = 128;
    case INVITE = 512;

// Libellé propre pour l'affichage
public function label(): string
{
    return match($this) {
        self::ADMINISTRATEUR =>'Administratur',
        self::OPERATEUR =>'Opérateur',
        self::EXPLOITANT =>'Exploitant',
        self::COMPTABLE =>'Comptable',
        self::ANALYSTE =>'Analyste',
        self::LOCATAIRE =>'Locataire',
        self::GARANT =>'Garant',
        self::CANDIDAT =>'Candidat',
        self::INVITE =>'Invité',
    };
}

}