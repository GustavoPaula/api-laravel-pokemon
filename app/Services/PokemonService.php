<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Mapper\PokemonMapper;

class PokemonService
{
  public function httpRequest(String $pokemon): array
  {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon;
    $response = Http::get($url);
    return PokemonMapper::fromApiToDB($response);
  }
}