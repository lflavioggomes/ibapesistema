<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    
    protected $table = 'solicitacao';

    protected $fillable = [
        'user_id',
        'status_id',
        'solicitacao',
        'aceita'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
