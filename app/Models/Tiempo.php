<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{
    use HasFactory;

    protected $fillable = ['tiempo_formateado', 'duracion_segundos', 'descripcion'];
}
