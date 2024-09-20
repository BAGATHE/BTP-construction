<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paiement;

class Devis extends Model
{
    use HasFactory;
    protected $table = 'devis';
    protected $fillable=[
     'numero',
     'ref_devis',
     'type_maison',
     'finition',
     'taux_finition',
     'date_debut',
     'date_reference',
     'date_fin',
     'lieu',
     'prix_total_travaux'
    ];

    /**
     * Obtenez les paiements associés au devis.
     */
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'ref_devis', 'ref_devis');
    }

    /**
     * Calculez la somme des paiements associés à ce devis.
     *
     * @return float
     */
    public function sommePaiements()
    {
        return $this->paiements()->sum('montant');
    }

    public function totalDevis($year){
       return Devis::selectRaw('EXTRACT(MONTH FROM date_reference) as month')
            ->selectRaw('SUM(prix_total_travaux) as total')
            ->whereYear('date_reference', $year)
            ->groupByRaw('EXTRACT(MONTH FROM date_reference)')
            ->orderBy('month', 'asc')
            ->get();
    }


}

