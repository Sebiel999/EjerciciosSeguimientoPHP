<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $fillable = ['descripcion', 'monto', 'categoria', 'fecha'];
}
