<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    public function evaluacion(){
        return $this->morphTo();
    }
    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
