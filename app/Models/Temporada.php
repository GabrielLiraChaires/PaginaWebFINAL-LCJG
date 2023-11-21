<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
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
