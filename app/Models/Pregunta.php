<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //use HasFactory;
    protected $fillable = [
        'evaluacion_id', 'detalle', 'estado', 'puntaje', 
    ];
}
