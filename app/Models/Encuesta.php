<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable = ['titulo', 'descripcion'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}
