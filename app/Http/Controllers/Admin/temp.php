
public function storeDataCSV(){
        try {
        $csv_maison_travaux = Reader::createFromPath(request()->file('maison_travaux')->getRealPath(), 'r');
        $csv_maison_travaux->setHeaderOffset(0); // si le CSV a une ligne d'en-tête
        $header_maison_travaux = $csv_maison_travaux->getHeader();

        if (!$header_maison_travaux || count($header_maison_travaux) === 0) {
            throw new \Exception('Invalid CSV header.');
        }

        $cleaned_header = array_map(function($header) {
            return trim(preg_replace('/\s+/', ' ', $header));
        }, $header_maison_travaux);

        $records =iterator_to_array($csv_maison_travaux->getRecords());


        for($i=1;$i<=count($records);$i++) {

            // Vérifiez ou créez une maison
            $maison = Maison::firstOrCreate(
                [
                    'type_maison' => $records[$i]['type_maison'],
                    'description' => $records[$i]['description'],
                    'surface' => $records[$i]['surface'],
                    'duree_travaux' => $records[$i]['duree_travaux']
                ]
            );


       /*
            // Vérifiez ou créez un travaux
            $travaux = Travaux::firstOrCreate(
                [
                    'code_travaux' => $record['code_travaux'],
                    'type_travaux' => $record['type_travaux'],
                    'unite' => $record['unite'],
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
            */

        }

         /*
        //DEVIS
        $csv_devis = Reader::createFromPath(request()->file('devis')->getRealPath(), 'r');
        $csv_devis->setHeaderOffset(0); // si le CSV a une ligne d'en-tête
        $header_devis = $csv_devis->getHeader(); // Affiche l'en-tête
        $devis_records = $csv_devis->getRecords();
        foreach ($devis_records as $record) {
            if (empty(array_filter($record))) {
            continue;
        }
            User::firstOrCreate([
                'numero'=>$record['client']
            ]);

        //calcul date fin travaux
        $duree = Maison::where('type_maison',$record['type_maison'])->value('duree_travaux');
        $date_debut_carbon = Carbon::parse($record['date_debut']);
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

*/
return redirect(to_route('admin.maison_travaux_devis'))->with('success', 'All good!');
    } catch (\League\Csv\Exception $e) {
        // Log the error or handle it accordingly
        \Log::error('CSV Error: ' . $e->getMessage());
    } catch (\Exception $e) {
        // Log any other errors
        \Log::error('General Error: ' . $e->getMessage());
    }


    }
