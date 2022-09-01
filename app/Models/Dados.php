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
        'status_id',
        'nacionalidade',
        'naturalidade',
        'sexo',
        'nascimento',
        'rg',
        'emissor',
        'dataemissao',
        'cpf',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'pais',
        'telefone',
        'fax',
        'email',
        'crea',
        'formacao',
        'outro'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }
}
