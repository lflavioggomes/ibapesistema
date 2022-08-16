<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    
    protected $table = 'atestados';

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
