<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premiado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'entidade',
        'avaliacao',
        'trabalho',
        'evento',
        'arquivo',
        'confirma',
        'previaponto'
    ];
}
