<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    //use HasFactory;
    protected $fillable = [
        'docente_id', 'grado', 'seccion', 'fecha_creacion', 'estado',
    ];
}
