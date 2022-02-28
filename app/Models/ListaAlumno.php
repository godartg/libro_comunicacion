<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaAlumno extends Model
{
    //use HasFactory;
    protected $fillable = [
        'salon_id', 'alumno_id', 'estado',
    ];
}
