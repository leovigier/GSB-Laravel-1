<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiteurs extends Model
{

    protected $fillable=
        [
            'id',
            'nom',
            'prenom',
            'adresse',
            'cp',
            'ville',
            'dateEmbauche'
        ];

}
