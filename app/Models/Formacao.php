<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'graduacao',
        'arquivo',
        'titulacao',
        'nivel',
        'instituicao',
        'previaponto',
        'confirma',
        'inicio',
        'termino'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
