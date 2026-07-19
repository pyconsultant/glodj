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
}