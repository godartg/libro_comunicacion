<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function listaAlumnos(){
        return $this->hasMany(ListaAlumno::class);
    }
}
