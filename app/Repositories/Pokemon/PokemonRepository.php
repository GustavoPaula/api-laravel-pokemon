<?php

namespace App\Repositories\Pokemon;

use App\Models\Pokemon\Pokemon;

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
    
  }
}