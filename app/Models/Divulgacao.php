<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divulgacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'titulo',
        'tipo',
        'editora',
        'edicao',
        'idioma',
        'meio',
        'ano',
        'previaponto'
    ];
}
