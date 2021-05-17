<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisForfait extends Model
{
    use HasFactory;

    protected $table = 'frais_forfaits';

    protected $fillable = [
        'libelle',
        'montant',
    ];

}
