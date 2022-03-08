<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    public function unidads(){
        return $this->hasMany(Unidad::class);
    }
}
