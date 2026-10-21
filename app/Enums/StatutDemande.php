<?php

namespace App\Enums;

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