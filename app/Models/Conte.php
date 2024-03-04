<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conte extends Model
{
    use HasFactory;

    public function motcles()
    {
        return $this->belongsToMany(MotCle::class);
    }

    public function caverne()
    {
        return $this->belongsTo(caverne::class);
    }
}
