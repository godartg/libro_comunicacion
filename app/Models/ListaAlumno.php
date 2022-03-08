<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaAlumno extends Model
{
    use HasFactory;
    public function salon(){
        return $this->belongsTo(Salon::class);
    }
    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
