<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Mapper\PokemonMapper;
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
    //$repository = $this->pokemonRepository->createPokemon($mapper);
    return $mapper;
  }
}