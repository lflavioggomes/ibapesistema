<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'comprovou',
        'art_rrt',
        'contratante',
        'arquivo',
        'previaponto'
    ];
}
