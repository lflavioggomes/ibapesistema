<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Julgador extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'name',
        'email',
    ];

}
