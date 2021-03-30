<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Fiche de frais</title>
    </head>

    <body>

        <h1 style="text-align: center">Fiche de frais</h1>
        <p style="text-align: center;text-decoration: underline">Récapitulatif du mois</p>
        <br/>
        <p style="text-decoration: underline"><strong>Liste des frais par type de frais</strong></p>
        <label>Prenom du visiteur : <strong>{{Auth::user()->name}}</strong></label><br/>
        <label>Identifiant : <strong>{{Auth::user()->visiteur_id}}</strong></label>
        <br/><br/><br/><br/>
        @foreach($Expenses as $Expense)
            <Label>Type de frais : <strong>{{$Expense->FraisForfait_id}}</strong></Label><br/>
            <label>Quantité sur le mois : <strong>{{$Expense->quantite}}</strong></label><br/><br/><br/>
        @endforeach

        <p style="text-decoration: underline"><strong>Tarif des Frais</strong></p>
        <p><strong>Nuitée : 80,00€/nuit</strong></p>
        <p><strong>Repas : 25,00€/repas</strong></p>
        <p><strong>Kilomètre : 0.62€/Km</strong></p>
    </body>
</html>
