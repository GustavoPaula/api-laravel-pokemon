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

  public function httpRequest(PokemonDTO $data) : array
  {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$data->getPokemon();
    $response = Http::get($url);
    // Mapeia a resposta da API para o formato do banco de dados
    $mapperToDB = PokemonMapper::fromApiToDB($response);
    // Cria o Pokémon no banco de dados
    $pokemonModel = $this->pokemonRepository->createPokemon($mapperToDB);
    // Carrega o Pokémon com as habilidades associadas
    $pokemonAbilities = $this->pokemonRepository->getPokemon($pokemonModel->id);
    // Mapeia os dados do banco de dados para o formato da API
    $mapperToApi = PokemonMapper::fromDBToApi($pokemonModel, $pokemonAbilities);

    return $mapperToApi;
  }

}
