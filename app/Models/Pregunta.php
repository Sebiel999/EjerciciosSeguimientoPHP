<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['encuesta_id', 'texto'];

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
