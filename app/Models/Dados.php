<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dados extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nacionalidade',
        'naturalidade',
        'sexo',
        'nascimento',
        'rg',
        'emissor',
        'dataemissao',
        'cpf',
        'pai',
        'mae',
        'endereco',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'pais',
        'telefone',
        'fax',
        'email',
        'homepage'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
