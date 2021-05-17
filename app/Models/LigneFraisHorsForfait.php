<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneFraisHorsForfait extends Model
{
    use HasFactory;

    protected $table = 'ligne_frais_hors_forfaits';

    protected $fillable = [
        'visiteur_id',
        'mois',
        'libelle',
        'date',
        'montant',
    ];

}
