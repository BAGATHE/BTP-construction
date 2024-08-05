<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Devis;
class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_devis',
        'ref_paiement',
        'date_paiement',
        'montant',
    ];

    /**
     * Obtenez le devis associé au paiement.
     */
    public function devis()
    {
        return $this->belongsTo(Devis::class,'ref_devis', 'ref_devis');
    }


    /**
     * Générer une référence de paiement aléatoire.
     *
     * @return string
     */
    public static function generateReference()
    {
        // Générer une lettre aléatoire
        $letter = chr(rand(65, 90)); // De A à Z

        // Générer 5 chiffres aléatoires
        $digits = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        return $letter . $digits;
    }

    /**
     * montant total payement deja effectuer
     * @return float
     */
    public static function sommePaiementEffectuer(){
     return self::sum('montant');
    }
}
