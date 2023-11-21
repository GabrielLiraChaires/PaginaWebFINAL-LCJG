<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    public function nino()
    {
        return $this->belongsTo(Nino::class);
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
