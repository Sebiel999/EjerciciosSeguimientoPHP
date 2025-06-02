<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContrasenaGenerada extends Model
{
    protected $fillable = ['valor', 'longitud', 'tipos'];
}
