<?php

namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Http;
use App\Mapper\Pokemon\PokemonMapper;
use App\Models\Pokemon\Pokemon;
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
    $pokemon = $this->pokemonRepository->createPokemon($mapper);
    
    return $mapper;
  }
}