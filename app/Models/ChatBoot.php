<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatBoot extends Model
{
    public function chatboot()
    {
        return $this->belongsTo(ChatBoot::class);
    }
    protected $fillable = [
        'pregunta',
        'respuesta'
    ];
}
