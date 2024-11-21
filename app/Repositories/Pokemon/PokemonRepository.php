<?php

namespace App\Repositories\Pokemon;

use App\Models\Pokemons;

class PokemonRepository
{
  public function createPokemon(array $request)
  {
    $pokemon = new Pokemons;
    $pokemon->name = $request;
    $pokemon->save();
    return [];
  }
}