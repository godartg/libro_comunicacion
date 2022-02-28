<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //use HasFactory;
    protected $fillable = [
        'curso_id', 'docente_id', 'titulo', 'estado',
    ];
}
