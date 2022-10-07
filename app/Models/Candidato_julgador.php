<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato_julgador extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidato_id',
        'julgador_id',
    ];

}
