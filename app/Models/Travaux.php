<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    use HasFactory;
    protected $table = 'travaux';
    protected $fillable = [
        'code_travaux',
        'type_travaux',
        'unite',
        'quantite',
        'prix_unitaire',
    ];
}
