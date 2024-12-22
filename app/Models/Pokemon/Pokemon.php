<?php

namespace App\Models\Pokemon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    protected $fillable = [
        'name',
    ];

    public function abilities(): HasMany
    {
        return $this->hasMany(Ability::class);
    }
}
