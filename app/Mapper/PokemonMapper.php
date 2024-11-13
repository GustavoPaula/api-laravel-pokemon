<?php

namespace App\Mapper;

use Illuminate\Http\Client\Response;

class PokemonMapper
{
  public static function fromApiToDB(Response $pokemon): array
  {
    $mapper = [
      'atributos'=>$pokemon['abilities'][0]['ability']['name']
    ];

    return $mapper;
  }
}