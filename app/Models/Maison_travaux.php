<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public static function calculateTotalForTypeMaison($type_maison)
    {
        return self::where('type_maison', $type_maison)
                    ->selectRaw('SUM(prix_unitaire * quantite) as total')
                    ->pluck('total')
                    ->first();
    }
}
