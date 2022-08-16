<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'graduacao',
        'diploma',
        'confirma'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
