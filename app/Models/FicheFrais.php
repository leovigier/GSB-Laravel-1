<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FicheFrais extends Model
{

    protected $table = 'fiche_frais';

    protected $fillable=
        [
            'visiteur_id',
            'mois',
            'nbJustificatifs',
            'montantValid',
            'dateModif',
            'id_Etat'
        ];

}
