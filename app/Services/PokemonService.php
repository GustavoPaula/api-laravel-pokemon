<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokemonService
{
  public function httpRequest(String $pokemon)
  {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon;
    $pokemon = Http::get($url);
    $mapper = [
      'atributos'=>$pokemon['abilities'][0]['ability']['name']
    ];

    return $mapper;
  }
}