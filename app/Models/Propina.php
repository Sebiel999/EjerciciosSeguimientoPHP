<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propina extends Model
{
    protected $fillable = ['monto_total', 'porcentaje', 'valor_propina'];
}
