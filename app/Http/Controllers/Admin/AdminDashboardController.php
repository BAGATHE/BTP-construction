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
    public function index():view{

          $date_now = Carbon::now()->format('Y-m-d');
          $devis = Devis::with('paiements')->where('date_fin','>=',$date_now)->get();
          $montant_total_devis = 0;
          // Calculer la somme des paiements pour chaque devis
         foreach ($devis as $devi) {
            $montant_total_devis = $montant_total_devis + $devi->prix_total_travaux;
            $devi->somme_paiements = $devi->sommePaiements();
        }



       return view('admin.homeadmin',compact('devis','montant_total_devis'));

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

       $total_devis = Devis::selectRaw('EXTRACT(MONTH FROM date_reference) as month')
        ->selectRaw('SUM(prix_total_travaux) as total')
        ->whereYear('date_reference', $year) // Filtrer par année
        ->groupByRaw('EXTRACT(MONTH FROM date_reference)') // Grouper par mois
        ->orderBy('month', 'asc') // Ordonner par mois en ordre croissant
        ->get(); // Récupérer les résultats

       $total_paiement = Paiement::selectRaw('EXTRACT(MONTH FROM date_paiement) as month')
       ->selectRaw('SUM(montant) as total')
       ->whereYear('date_paiement', $year) // Filtrer par année
       ->groupByRaw('EXTRACT(MONTH FROM date_paiement)') // Grouper par mois
       ->orderBy('month', 'asc') // Ordonner par mois en ordre croissant
       ->get(); // Récupérer les résultats

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
