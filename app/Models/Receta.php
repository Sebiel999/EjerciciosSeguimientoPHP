<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['titulo', 'ingredientes', 'preparacion', 'tipo'];
}
