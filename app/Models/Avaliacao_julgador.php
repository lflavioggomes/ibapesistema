<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao_julgador extends Model
{
    use HasFactory;

    protected $fillable = [
        'julgador_id',
        'avaliacao',
    ];
}
