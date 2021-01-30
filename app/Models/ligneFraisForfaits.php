<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ligneFraisForfaits extends Model
{
    use Notifiable;

    protected $fillable=[
        'visiteur',
        'mois',
        'nuitee',
        'repas',
        'Km',
        'quantité'
    ];
}
