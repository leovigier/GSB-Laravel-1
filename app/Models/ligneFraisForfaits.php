<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LigneFraisForfaits extends Model
{
    use Notifiable;
    
    protected $table = 'ligne_frais_forfaits';

    protected $fillable=[
        'visiteur_id',
        'mois',
        'FraisForfait_id',
        'quantité'
    ];
}
