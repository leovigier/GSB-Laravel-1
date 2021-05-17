<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visiteurs extends Model
{

    protected $fillable=[
            'id',
            'nom',
            'prenom',
            'adresse',
            'cp',
            'ville',
            'dateEmbauche'
        ];

}
