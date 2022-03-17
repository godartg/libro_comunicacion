<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    public function evaluacion(){
        return $this->belongsTo(Evaluacion::class);
    }
    public function alternativas(){
        return $this->hasMany(Alternativa::class);
    }
    public function detalleEvaluacions(){
        return $this->hasMany(detalleEvaluacions::class);
    }
}
