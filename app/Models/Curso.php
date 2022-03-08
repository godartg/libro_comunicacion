<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public function evaluacions(){
        return $this->hasMany(Evaluacion::class);
    }
    public function materials(){
        return $this->hasMany(Material::class);
    }
}
