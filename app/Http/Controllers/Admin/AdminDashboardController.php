<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Devis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use \App\Models\Maison_travaux;
use \App\Models\Paiement;
class AdminDashboardController extends Controller
{
    public function __construct(Devis $devis,Paiement $paiement)
    {
        $this->devis = $devis;
        $this->paiement = $paiement;
    }

    public function index():view{

          $date_now = Carbon::now()->format('Y-m-d');
          $devis = Devis::with('paiements')->where('date_fin','>=',$date_now)->get();
          $montant_total_devis = Devis::SUM('prix_total_travaux');

          // Calculer la somme des paiements pour chaque devis
         foreach ($devis as $devi) {
            $devi->somme_paiements = $devi->sommePaiements();
        }

        $somme_paiement_effectuer = Paiement::sommePaiementEffectuer();

       return view('admin.homeadmin',compact('devis','montant_total_devis','somme_paiement_effectuer'));

    }

    public function travaux(Request $request){
        $type_maison = $request->query('type_maison');
        $travaux = Maison_travaux::where('type_maison',$type_maison)->get();

        return response()->json([
            'success' => true,
            'message' => 'Travaux récupérés avec succès',
            'travaux' => $travaux
        ]);

    }

    public function statDevisPaiement(Request $request){
       $year =  $request->input('year');

       $total_devis = $this->devis->totalDevis($year);
       $total_paiement = $this->paiement->totalPaiement($year);

       $total_devis = $total_devis->isEmpty() ? [] : $total_devis;
       $total_paiement = $total_paiement->isEmpty() ? [] : $total_paiement;

    return response()->json(
        [
            'success' => true,
            'total_devis' => $total_devis,
            'total_paiement' => $total_paiement
        ]);
    }


    /*SELECT EXTRACT(MONTH FROM date_reference) AS month, SUM(prix_total_travaux) AS total
      FROM devis
      WHERE EXTRACT(YEAR FROM date_reference) = 2024
      GROUP BY EXTRACT(MONTH FROM date_reference)
      ORDER BY month ASC;
    */

}
