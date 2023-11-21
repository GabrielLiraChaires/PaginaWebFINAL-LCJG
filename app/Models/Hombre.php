<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hombre extends Model
{
    public function hombre()
    {
        return $this->belongsTo(Hombre::class);
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
