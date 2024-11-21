<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemons extends Model
{
    protected $fillable = [
        'name',
        'abilities',
        'cries',
        'form',
        'games_indices'
    ];
}
