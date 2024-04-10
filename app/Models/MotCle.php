<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MotCle extends Model
{
    use HasFactory;
    protected $fillable = [
            'nom_motcle'
        ];

    public function contes()
    {
        return $this->belongsToMany(Conte::class);
    }
}
