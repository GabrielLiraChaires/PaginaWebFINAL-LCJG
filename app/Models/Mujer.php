<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mujer extends Model
{
    public function mujer()
    {
        return $this->belongsTo(Mujer::class);
    }
    protected $fillable = [
        'nombre',
        'descripcion',
        'colores',
        'categoria',
        'precio',
        'imagen'
    ];
}
