<?php

namespace App\Repositories\Pokemon;

use App\Models\Pokemon\Abilities;
use App\Models\Pokemon\Pokemons;

class PokemonRepository
{
  public function createPokemon($request)
  {
    $pokemon = new Pokemons;
    $pokemon->name = $request;
    $pokemon->save();
    return $pokemon;
  }

  public function createAbilities($request, $pokemonId)
  {
    $abilities = new Abilities;
    $abilities->name = $request;
    $abilities->pokemon_id = $pokemonId;
    $abilities->save();
    return $abilities;
  }
}