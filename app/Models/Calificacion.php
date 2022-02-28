<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    //use HasFactory;
    protected $fillable = [
        'evaluacion_id', 'alumno_id', 'nota',
    ];
}
