<?php

namespace App\Services\Pokemon;

use App\DTO\Pokemon\PokemonDTO;
use Illuminate\Support\Facades\Http;
use App\Mapper\Pokemon\PokemonMapper;
use App\Repositories\Pokemon\PokemonRepository;

class PokemonService
{
  public function __construct(private PokemonRepository $pokemonRepository)
  {}

  public function httpRequest(PokemonDTO $data): array
  {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$data->getPokemon();
    $response = Http::get($url);
    $mapperToDB = PokemonMapper::fromApiToDB($response);
    $pokemonModel = $this->pokemonRepository->createPokemon($mapperToDB);
    $pokemonWithAbilities = $this->pokemonRepository->getPokemon($pokemonModel->id);
    $mapperToApi = PokemonMapper::fromDBToApi($pokemonWithAbilities);

    return $mapperToApi;
  }
}