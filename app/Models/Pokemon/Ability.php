<?php

namespace App\Models\Pokemon;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'abilities';

    protected $fillable = [
        'name',
        'pokemon_id'
    ];

    public function service()
    {
        return $this->belongsTo(Pokemon::class, 'pokemon_id', 'id');
    }
}
