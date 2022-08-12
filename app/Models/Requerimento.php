<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'solicitacao',
        'aceita'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
