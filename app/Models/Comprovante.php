<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprovante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'comprovante',
        'confirma'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
