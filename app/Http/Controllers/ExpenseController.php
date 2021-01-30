<?php

namespace App\Http\Controllers;

use App\Models\ligneFraisForfaits;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Utils;

class ExpenseController extends Controller
{
    public function generateExpenseSheet(){
        return view('VueAjoutFicheFrais');
    }

    public function validAddExpenseSheet(){
        return view('vueVerifAjoutFicheFrais');
    }

    public function sendNuiteeDataToDataBase(Request $req){
        $rules = [
            'visiteur' => 'required|string',
            'mois' => 'required|date',
            'nuitee' => 'required|integer'
        ];
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return redirect('VueAjoutFicheFrais')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $req->input();
            try{
                $frais = new ligneFraisForfaits();
                $frais->visiteur_id = $data['visiteur'];
                $frais->mois = $data['mois'];
                $frais->FraisForfait_id = "NUI" ;
                $frais->quantité = $data['nuitee'];
                return redirect(route('ConfirmAjout'))->with('status', "Insert successfully");
            }catch(\Exception $e){
                return redirect(route('ConfirmAjout'))->with('failed', "operation failed");
            }
        }
    }
}
