<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMINISTRATEUR = 1;
    case GESTIONNAIRE = 2;
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
        self::ADMINISTRATEUR =>__('Administrateur'),
        self::GESTIONNAIRE =>__('Gestionnaire'),
        self::EXPLOITANT =>__('Exploitant'),
        self::COMPTABLE =>__('Comptable'),
        self::ANALYSTE =>__('Analyste'),
        self::LOCATAIRE =>__('Locataire'),
        self::GARANT =>__('Garant'),
        self::CANDIDAT =>__('Candidat'),
        self::INVITE =>__('Invité'),
    };
}

}

enum StatutDemande: int
{
    case A_ETUDIER = 1;
    case REFUSEE= 2;
    case COMPLEMENTS_DEMANDES = 3;
    case ACCEPTEE = 4;

// Libellé propre pour l'affichage
public function label(): string
{
    return match($this) {
        self::A_ETUDIER =>'a étudier',
        self::REFUSEE =>'refusée',
        self::COMPLEMENTS_DEMANDES =>'compléments demandés',
        self::ACCEPTEE =>'acceptée',
    };
}

}