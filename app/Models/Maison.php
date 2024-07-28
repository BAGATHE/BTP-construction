<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_maison',
        'description',
        'surface',
        'duree_travaux'
    ];
}
