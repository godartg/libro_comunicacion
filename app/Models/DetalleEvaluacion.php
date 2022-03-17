<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEvaluacion extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function pregunta(){
        return $this->belongsTo(Pregunta::class);
    }
    public function alternativa(){
        return $this->belongsTo(Alternativa::class);
    }
}
