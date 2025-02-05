<?php

namespace App\Repositories\Pokemon;

use App\Models\Pokemon\Pokemon;
use Illuminate\Database\Eloquent\Collection;

class PokemonRepository
{
  public function __construct(private Pokemon $pokemonModel)
  {}

  public function createPokemon(array $request): Pokemon
  {
    $pokemon = $this->pokemonModel->create($request);
    $pokemon->abilities()->createMany($request['abilities']);

    return $pokemon;
  }

  public function getPokemon(int $pokemonId): Pokemon 
  {
    $pokemon = Pokemon::with('abilities')->find($pokemonId);
    
    return $pokemon;
  }
}