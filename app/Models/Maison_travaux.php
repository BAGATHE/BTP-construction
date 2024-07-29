<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Finition;

class Maison_travaux extends Model
{
    use HasFactory;
    protected $table = 'maison_travaux';
    protected $fillable = [
        'type_maison',
        'description',
        'surface',
        'code_travaux',
        'type_travaux',
        'unite',
        'prix_unitaire',
        'quantite',
        'duree_travaux',
    ];

    /**
     * Calculer la somme du total (prix_unitaire * quantite) pour un type de maison donné.
     *
     * @param string $type_maison
     * @return float|null
     */
    public static  function calculateTotalForTypeMaison($type_maison)
    {
        return self::where('type_maison', $type_maison)
                    ->selectRaw('SUM(prix_unitaire * quantite) as total')
                    ->pluck('total')
                    ->first();
    }

    /**
 * Calculer le prix de finition basé sur le prix des travaux et le taux de finition.
 *
 * @param float $priceTravaux
 * @param float $taux
 * @return float
 */
    protected static  function getPriceFinition($priceTravaux,$taux){
        $priceFinition = ($priceTravaux * $taux)/100;
        return $priceFinition;
    }

    /**
 * Calculer le total pour un type de maison avec la finition appliquée.
 *
 * @param string $type_maison
 * @param string $type_finition
 * @return float
 */
    public static function calculateTotalForTypeMaisonWithFinition($type_maison,$type_finition)
    {
        $taux = Finition::getPercentageFinition($type_finition);
        $total = self::calculateTotalForTypeMaison($type_maison);
        $priceFinition = self::getPriceFinition($total,$taux);
        return $total + $priceFinition;

    }


}
