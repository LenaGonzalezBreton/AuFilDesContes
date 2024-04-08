<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conte extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_conte',
        'intro_conte',
        'image_conte',
        'histoire_conte',
        'nombre_lecture_note',
        'note_conte',
        'nombre_note_conte',
        'caverne_id',

    ];

    public function motcles()
    {
        return $this->belongsToMany(MotCle::class);
    }

    public function caverne()
    {
        return $this->belongsTo(caverne::class);
    }
}
