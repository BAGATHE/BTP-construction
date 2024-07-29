<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Maison;
use App\Models\Finition;
use App\Models\Devis;
use App\Models\Maison_travaux;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use App\Models\Paiement;
class ClientDevisController extends Controller
{
    public function index(){
        $devis = Devis::where('numero', Auth::user()->numero)->get();
        return view('client.homeclient',compact('devis'));
    }

    public function showDevisForm(){
        $maisons = Maison::all();
        $finitions = Finition::all();

        return view('client.formdevisclient',compact('maisons','finitions'));
    }

    public function storeDevis(Request $request){
        $userNumero  = Auth::user()->numero;
        /*recuperer la derniere insertion et creer une reference de devis unique*/
        $lastDevis = Devis::latest('id')->first();
        $last_id = $lastDevis ? $lastDevis->id : 0;
        $last_id = $last_id + 1;
        $formatted_id = sprintf('%03d', $last_id);
        $reference_devis = 'D' . $formatted_id;


        /*recuperer taux finition*/
        $taux_finition = Finition::where('type_finition', $request->input('type_finition'))->value('taux_finition');


        /*recuperation type maison et duree travaux*/
        $duree = Maison::where('type_maison',$request->input('type_maison'))->value('duree_travaux');


        // Récupérer la date et l'heure actuelles
        $date_devis = Carbon::now()->format('Y-m-d');

        $date_debut_carbon = Carbon::parse($request->input('date_debut'));

        $date_fin_carbon = $date_debut_carbon->addDays($duree);
        $date_fin = $date_fin_carbon->format('Y-m-d');

        $devis = Devis::create([
            'numero' =>$userNumero,
            'ref_devis'=>$reference_devis,
            'type_maison'=>$request->input('type_maison'),
            'finition'=>$request->input('type_finition'),
            'taux_finition'=>$taux_finition,
            'date_debut'=>$request->input('date_debut'),
            'date_reference'=>$date_devis,
            'date_fin'=>$date_fin,
            'lieu'=>$request->input('lieu'),
            'prix_total_travaux'=> Maison_travaux:: calculateTotalForTypeMaisonWithFinition($request->input('type_maison'),$request->input('type_finition'))

        ]);
        return to_route('client.home')->with('success','the devis was created');
    }



    public function exportPDF($type_maison)
    {
        $devis = Maison_travaux::where('type_maison',$type_maison)->get();
        $global_devis = Devis::where('numero', Auth::user()->numero)->get()->first();
        $total = Maison_travaux::calculateTotalForTypeMaison($type_maison);

        //return view('client.devispdf', compact('devis','total','global_devis'));
        $pdf = PDF::loadView('client.devispdf', compact('devis','total','global_devis'));
        //return $pdf->download('devis.pdf');
        return $pdf->stream('devis.pdf');
    }

    public function handlePayment(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'amount' =>'required|numeric',
            'date' =>'required|date',
            'reference' => 'required|string|max:255',
        ]);

        // Traiter les données

        $montant = $validatedData['amount'];
        $ref_devis = $validatedData['reference'];
        $date_paiement = $validatedData['date'];


        $devis = Devis::where('ref_devis', $ref_devis)->firstOrFail();
        $total_paiements = $devis->sommePaiements();
        $total_prix_travaux = $devis->prix_total_travaux;
        $reste = $total_prix_travaux - $total_paiements;


        if($montant > $reste){
            $difference = $montant - $reste;
            return response()->json(['message' => 'transaction invalide il vous reste a payer que'. number_format($reste, 2) . '.']);
        }else{
             Paiement::create([
                'ref_devis'=>$ref_devis,
                'ref_paiement'=>Paiement::generateReference(),
                'date_paiement'=>$date_paiement,
                'montant'=>$montant,
             ]);
        $reste = $total_prix_travaux - $devis->sommePaiements();
        // Répondre avec une réponse JSON
        return response()->json(['message' => 'Paiement effectuez avec succes il vous reste a payer'. number_format($reste, 2) . '.']);
        }
    }
}
