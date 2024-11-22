<?php

namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Http;
use App\Mapper\Pokemon\PokemonMapper;
use App\Repositories\Pokemon\PokemonRepository;

class PokemonService
{
  public function __construct(private PokemonRepository $pokemonRepository)
  {}

  public function httpRequest(String $pokemon)
  {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon;
    $response = Http::get($url);
    $mapper = PokemonMapper::fromApiToDB($response);
    
    foreach($mapper['Forms'] as $forms)
    {
      $pokemon = $this->pokemonRepository->createPokemon($forms);
    }

    $abilities = [];

    foreach($mapper['Abilities'] as $ability)
    {
      array_push($abilities, $this->pokemonRepository->createAbilities($ability, $pokemon['id']));
    }

    $repository = [
      "Name" => $pokemon,
      "Abilities" => $abilities
    ];
    
    return $repository;
  }
}