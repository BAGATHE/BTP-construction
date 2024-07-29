<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finition extends Model
{
    use HasFactory;
    protected $fillable = [
          'type_finition',
          'prix',
          'taux_finition'
    ];


     /**
     * recuperer le pourcentage de finition
     *
     * @param string $type_finition
     * @return float|null
     */

     public static function getPercentageFinition($type_finition){
        $finition =  self::where('type_finition',$type_finition)->first(['taux_finition']);
        return $finition ? $finition->taux_finition : 0;
    }
}
