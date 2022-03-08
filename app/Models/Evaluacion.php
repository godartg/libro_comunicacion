<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    public function calificacion(){
        return $this->morphOne(Evaluacion::class);
    }
    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }
}
