<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'confirma',
        'tipo_dado'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
