<?php

namespace App\Repositories\Pokemon;

use App\Models\Pokemon\Pokemon;

class PokemonRepository
{
  public function __construct(private Pokemon $pokemonModel)
  {}

  public function createPokemon(array $request)
  {
    //$pokemon = new Pokemon;
    //DB::table('pokemons')->insert($request);
    //$pokemon->abilities()->createMany($request);
    return Pokemon::create([
      'name' => $request
    ]);
  }

  public function createAbilities($pokemon)
  {
    return $this->pokemonModel->abilities()->createMany($pokemon);
  }
}