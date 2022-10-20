<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'evento',
        'avaliacao',
        'nome',
        'entidade',
        'arquivo',
        'previaponto'
    ];
}
