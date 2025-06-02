<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['nombre_servicio', 'fecha_hora', 'confirmada'];
}
