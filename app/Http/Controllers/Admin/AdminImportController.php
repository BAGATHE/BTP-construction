<?php

namespace App\Http\Controllers\Admin;
use League\Csv\Reader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Maison;
use App\Models\Travaux;
use App\Models\Maison_travaux;
use App\Models\Devis;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Paiement;
class AdminImportController extends Controller
{
    public function pageImportTravauxDevis():view{
        return view('admin.import.travauxDevis');
    }
    public function pageImportPaiement():view{
        return view('admin.import.paiement');
    }

    /*netoyage entete*/
    private function validateAndCleanCsvHeader($csvReader) {
        $header = $csvReader->getHeader();

        if (!$header || count($header) === 0) {
            throw new \Exception('Invalid CSV header.');
        }

        $cleanedHeader = array_map(function($header) {
            return trim(preg_replace('/\s+/', ' ', $header));
        }, $header);

        return $cleanedHeader;
    }
//traiter les enregistreent maison travaux
    private function store_maison_travaux($csvReader) {
        $records = iterator_to_array($csvReader->getRecords());

        foreach ($records as $record) {
            // Vérifiez ou créez une maison
            $maison = Maison::firstOrCreate(
                [
                    'type_maison' => $record['type_maison'],
                    'description' => $record['description'],
                    'surface' => $record['surface'],
                    'duree_travaux' => $record['duree_travaux']
                ]
            );

            // Vérifiez ou créez un travaux
            $travaux = Travaux::firstOrCreate(
                [
                    'code_travaux' => $record['code_travaux'],
                    'type_travaux' => $record['type_travaux'],
                    'unite' => $record['unite']
                ],
                [
                    'quantite' => $record['quantite'],
                    'prix_unitaire' => $record['prix_unitaire']
                ]
            );

            // Vérifiez ou créez une maison_travaux
            Maison_travaux::firstOrCreate(
                [
                    'type_maison' => $record['type_maison'],
                    'description' => $record['description'],
                    'surface' => $record['surface'],
                    'code_travaux' => $record['code_travaux'],
                    'type_travaux' => $record['type_travaux'],
                    'unite' => $record['unite'],
                    'prix_unitaire' => $record['prix_unitaire'],
                    'quantite' => $record['quantite'],
                    'duree_travaux' => $record['duree_travaux']
                ]
            );
        }
    }


    /**enregistrement devis */
    private function store_devis($csvReader) {
        $devis_records = iterator_to_array($csvReader->getRecords());
        foreach ($devis_records as $record) {
            User::firstOrCreate([
                'numero'=>$record['client']
            ]);
        //calcul date fin travaux
        $duree = Maison::where('type_maison',$record['type_maison'])->value('duree_travaux');
        $date_debut_carbon = Carbon::createFromFormat('d/m/Y', $record['date_debut']);
        $date_fin_carbon = $date_debut_carbon->addDays($duree);
        $date_fin = $date_fin_carbon->format('Y-m-d');

        //recupere le coup de la maison
        $prix_total_maison =   Maison_travaux::calculateTotalForTypeMaisonWithFinition($record['type_maison'],$record['finition']);

        // Vérifiez ou créez un devis
        $devis = Devis::firstOrCreate([
                'numero'=>$record['client'],
                'ref_devis'=>$record['ref_devis'],
                'type_maison'=>$record['type_maison'],
                'finition'=>$record['finition'],
                'taux_finition'=>$record['taux_finition'],
                'date_reference'=>$record['date_devis'],
                'date_debut'=>$record['date_debut'],
                'date_fin'=>$date_fin,
                'lieu'=>$record['lieu'],
                'prix_total_travaux'=>$prix_total_maison
            ]);

        }

    }
    public function storeDataCSV() {
        try {
            /***ENREGISTREMENT MAISON TRAVAUX */

            $csv_maison_travaux = Reader::createFromPath(request()->file('maison_travaux')->getRealPath(), 'r');
            $csv_maison_travaux->setHeaderOffset(0); // si le CSV a une ligne d'en-tête
            // Utilisez la fonction pour valider et nettoyer les en-têtes
            $cleanedHeader = $this->validateAndCleanCsvHeader($csv_maison_travaux);
            // Traitez les enregistrements CSV
            $this->store_maison_travaux($csv_maison_travaux);

            /***ENREGISTREMENT DEVIS */
            $csv_devis = Reader::createFromPath(request()->file('devis')->getRealPath(), 'r');
            $csv_devis->setHeaderOffset(0); // si le CSV a une ligne d'en-tête
            $cleanedHeader_devis = $this->validateAndCleanCsvHeader($csv_devis);
            $this->store_devis($csv_devis);

            return redirect()->route('admin.maison_travaux_devis')->with('success', 'All good!');
        } catch (\League\Csv\Exception $e) {
            // Log the error or handle it accordingly
            \Log::error('CSV Error: ' . $e->getMessage());
            return redirect()->route('admin.maison_travaux_devis')->with('error', 'CSV Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Log any other errors
            \Log::error('General Error: ' . $e->getMessage());
            return redirect()->route('admin.maison_travaux_devis')->with('error', 'General Error: ' . $e->getMessage());
        }
    }

    private function store_paiement($csvReader){
        $records = iterator_to_array($csvReader->getRecords());
        foreach ($records as $record) {
            $paiement = Paiement::firstOrCreate([
                'ref_devis'=>$record['ref_devis'],
                'ref_paiement'=>$record['ref_paiement'],
                'date_paiement'=>$record['date_paiement'],
                'montant'=>$record['montant'],
            ]);
    }

}
/*
if (isset($record['pourcentage'])) {
    $record['pourcentage'] = str_replace(',', '.', $record['pourcentage']);
}
*/
    public function storeCsvPaiement(){
        try {
        $csv_paiement = Reader::createFromPath(request()->file('paiement')->getRealPath(), 'r');
        $csv_paiement->setHeaderOffset(0);
        // Utilisez la fonction pour valider et nettoyer les en-têtes
        $cleanedHeader = $this->validateAndCleanCsvHeader($csv_paiement);
        // Traitez les enregistrements CSV
        $this->store_paiement($csv_paiement);
        return redirect()->route('admin.storecsvPaiement')->with('success', 'All good!');
     }catch (\League\Csv\Exception $e) {
    // Log the error or handle it accordingly
    \Log::error('CSV Error: ' . $e->getMessage());
    return redirect()->route('admin.maison_travaux_devis')->with('error', 'CSV Error: ' . $e->getMessage());
    } catch (\Exception $e) {
    // Log any other errors
    \Log::error('General Error: ' . $e->getMessage());
    return redirect()->route('admin.maison_travaux_devis')->with('error', 'General Error: ' . $e->getMessage());
    }

}

}
