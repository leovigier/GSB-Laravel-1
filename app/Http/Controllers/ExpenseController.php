<?php

namespace App\Http\Controllers;

use App\Models\LigneFraisForfaits;
use App\Models\LigneFraisHorsForfait;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    //retourner les vues
    public function generateExpenseSheet(){
        return view('VueAjoutFicheFrais');
    }

    public function validAddExpenseSheet(){
        return view('vueVerifAjoutFicheFrais');
    }

    //retourner les ajout a la base de données pour le visiteur connecté

    public function sendDataToDataBase(Request $request){
        //insertion de la ligne de frais "specifique" dans la bdd
        //forfait

        $ajout = new LigneFraisForfaits();
        $ajout->visiteur_id = $request->visiteur;
        $ajout->mois = $request->mois;
        $ajout->FraisForfait_id = $request->tag;
        $ajout->quantite = $request->amount;
        $ajout->save();

        /*DB::table('ligne_frais_forfaits')
            ->insert([
                'visiteur_id' => $request->visiteur,
                'mois' => $request->mois,
                'FraisForfait_id' => $request->tag,
                'quantite' => $request->amount,
            ]);*/
        return view('vueVerifAjoutFicheFrais');
    }

    //hors forfait
    public function sendDataToDataBaseBis(Request $request){

        $ajout = new LigneFraisHorsForfait();
        $ajout->visiteur_id = $request->visiteur;
        $ajout->mois = $request->mois;
        $ajout->libelle = $request->libelle;
        $ajout->date = $request->date;
        $ajout->montant = $request->montant;
        $ajout->save();

        /*DB::table('ligne_frais_hors_forfaits')
            ->insert([
                'visiteur_id' => $request->visiteur,
                'mois'=> $request->mois,
                'libelle'=> $request->libelle,
                'date'=> $request->date,
                'montant'=> $request->montant,
            ]);*/
        return view('vueVerifAjoutFicheFrais');
    }

    //recupération des listes du visiteur connecté
    //forfait
    public function getAllExpenseOfCurrentUser(){
        $user = Auth::user()->visiteur_id;

        $Expenses = LigneFraisForfaits::where('visiteur_id', $user)->get();

        /*$Expenses = DB::table('ligne_frais_forfaits')
            ->select('mois', 'FraisForfait_id', 'quantite')
            ->where('visiteur_id', $User)
            ->get();*/
        return view('vueListeFicheFrais',compact('Expenses'));
    }

    //hors forfait
    public function getAllExpenseOfCurrentUserBis(){
        $user = Auth::user()->visiteur_id;

        $ExpensesBis = LigneFraisHorsForfait::where('visiteur_id', $user)->get();

        /*$ExpensesBis = DB::table('ligne_frais_hors_forfaits')
            ->select('mois', 'libelle', 'date', 'montant')
            ->where('visiteur_id', $User)
            ->get();*/
        return view('vueListeFicheFraisHF',compact('ExpensesBis'));
    }

    // Modification des lignes de frais
    //forfait
    public function modifyExpenseOfCurrentUser(Request $request){
        $mois = $request->input('moisExpense');

        $modifyExpenses = LigneFraisForfaits::where('mois', $mois)->get();

        /*$modifyExpenses = DB::table('ligne_frais_forfaits')
            ->select('mois', 'FraisForfait_id', 'quantite')
            ->where([
                ['mois',$mois],
            ])
            ->get();*/
        return view('vueModifFicheFrais',compact('modifyExpenses'));
    }

    //hors forfait
    public function modifyExpenseOfCurrentUserHF(Request $request){
        $mois = $request->input('moisExpense');
        $date = $request->input('dateExpense');

        $modifyExpenseBis = LigneFraisHorsForfait::where([['mois', $mois], ['date', $date]])->get();

        /*$modifyExpenseBis = DB::table('ligne_frais_hors_forfaits')
            ->select('mois', 'libelle', 'date', 'montant')
            ->where([
                ['mois', $mois],
                ['date', $date],
            ])
            ->get();*/
        return view('vueModifFicheFraisHF',compact('modifyExpenseBis'));
    }

    //Application des modification d'une fiche de frais du visiteur connecté
    //forfait
    public function applyModifyExpenseOfCurrentUser(Request $request){
        $mois = $request->input('moisModif');
        $type = $request->input('typeModif');
        $newqte = $request->input('qteModif');

        LigneFraisForfaits::where([['mois', $mois], ['FraisForfait_id'], $type])->update(['quantite' => $newqte]);

        /*DB::table('ligne_frais_forfaits')
            ->where([
                ['mois', $mois],
                ['FraisForfait_id', $type]
            ])
            ->update(
                [
                    'quantite' => $newqte
                ]);*/
        return view('vueVerifModifFicheFrais');
    }

    //hors forfait
    public function applyModifyExpenseOfCurrentUserBis(Request $request){
        $mois = $request->input('moisModif');
        $nvxMontant = $request->input('montantmodif');
        $date = $request->input('dateModif');

        LigneFraisHorsForfait::where([['mois', $mois], ['date', $date]])->update(['montant'=> $nvxMontant]);

        /*DB::table('ligne_frais_hors_forfaits')
            ->where([
                ['mois', $mois],
                ['date', $date]
            ])
            ->update(
                [
                    'montant' => $nvxMontant,
                ]);*/
        return view('vueVerifModifFicheFrais');
    }

    // Génération du pdf des fiches de frais

    public function getValueToLoadOnPDF(){
        return View('PreDownLoad');
    }



    public function downloadPDF(Request $request){
        $user = Auth::user()->visiteur_id;
        $mois = $request->input('moisFF');

        $Expenses = LigneFraisForfaits::where([['visiteur_id', $user], ['mois', $mois]])->get();

        /*$Expenses = DB::table('ligne_frais_forfaits')
            ->select('mois', 'FraisForfait_id', 'quantite')
            ->where([
                ['visiteur_id', $User],
                ['mois', $mois],
            ])
            ->get();*/

        $pdf = PDF::loadView("ficheFrais", compact('Expenses'));
        return $pdf->download("fiche_de_frais-". $mois .".pdf");
    }

}
