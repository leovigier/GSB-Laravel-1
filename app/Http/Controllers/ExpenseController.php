<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function generateExpenseSheet(){
        return view('VueAjoutFicheFrais');
    }

    public function validAddExpenseSheet(){
        return view('vueVerifAjoutFicheFrais');
    }

    public function sendDataToDataBase(Request $request){
        $addExpense = DB::table('ligne_frais_forfaits')
            ->insert([
                'visiteur_id' => $request->visiteur,
                'mois' => $request->mois,
                'FraisForfait_id' => $request->tag,
                'quantité' => $request->nuitee,
            ]);
        return view('vueVerifAjoutFicheFrais');
    }

    public function sendDataToDataBaseBis(Request $request){
        $addExpense = DB::table('ligne_frais_hors_forfaits')
            ->insert([
                'visiteur_id' => $request->visiteur,
                'mois'=> $request->mois,
                'libelle'=> $request->libelle,
                'date'=> $request->date,
                'montant'=> $request->montant,
            ]);
        return view('vueVerifAjoutFicheFrais');
    }

    public function getAllExpenseOfCurrentUser(){
        $User = Auth::user()->visiteur_id;
        $Expenses = DB::table('ligne_frais_forfaits')
            ->select('mois', 'FraisForfait_id', 'quantité')
            ->where('visiteur_id', $User)
            ->get();
        return view('vueListeFicheFrais',compact('Expenses'));
    }

    public function getAllExpenseOfCurrentUserBis(){
        $User = Auth::user()->visiteur_id;
        $ExpensesBis = DB::table('ligne_frais_hors_forfaits')
            ->select('mois', 'libelle', 'date', 'montant')
            ->where('visiteur_id', $User)
            ->get();
        return view('vueListeFicheFraisHF',compact('ExpensesBis'));
    }

    public function applyModifyExpenseOfCurrentUser(Request $request){
        $mois = $request->input('moisModif');
        $newqte = $request->input('qteModif');
        $affect = DB::table('ligne_frais_forfaits')
            ->where('mois', $mois)
            ->update(
                [
                    'quantité' => $newqte
                ]);
        return view('vueVerifModifFicheFrais');
    }

    public function applyModifyExpenseOfCurrentUserBis(Request $request){
        $mois = $request->input('moisModif');
        $nvxMontant = $request->input('montantmodif');
        $affect = DB::table('ligne_frais_hors_forfaits')
            ->where('mois', $mois)
            ->update(
                [
                   'montant' => $nvxMontant,
                ]);
        return view('vueVerifModifFicheFrais');
    }

    public function modifyExpenseOfCurrentUser(Request $request){
        $mois = $request->input('moisExpense');
        $modifyExpenses = DB::table('ligne_frais_forfaits')
            ->select('mois', 'FraisForfait_id', 'quantité')
            ->where('mois', $mois)
            ->get();
        return view('vueModifFicheFrais',compact('modifyExpenses'));
    }

    public function modifyExpenseOfCurrentUserHF(Request $request){
        $mois = $request->input('moisExpense');
        $modifyExpenseBis = DB::table('ligne_frais_hors_forfaits')
            ->select('mois', 'libelle', 'date', 'montant')
            ->where('mois', $mois)
            ->get();
        return view('vueModifFicheFraisHF',compact('modifyExpenseBis'));
    }

}
