<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atuacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'numero_ano',
        'numero_hora',
        'total_hora',
        'atuacao',
        'arquivo',
        'previaponto'
    ];
}
