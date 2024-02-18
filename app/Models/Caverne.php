<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caverne extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_caverne',
        'intro_caverne',
        'image_caverne'
    ];
}
