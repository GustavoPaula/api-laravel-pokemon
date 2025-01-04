<?php

namespace App\Mapper\Pokemon;

use Illuminate\Http\Client\Response;
use App\Models\Pokemon\Pokemon;

class PokemonMapper
{
  public static function fromApiToDB(Response $pokemon): array
  {
    $array = json_decode($pokemon, TRUE);

    $mapper = [
      'name'=> $array['forms'][0]['name'],
      'abilities' => array_map(function ($ability) {
        return [
          'name' => $ability['ability']['name']
        ];
      }, $array['abilities']),
    ];

    return $mapper;
  }

  public static function fromDBToApi(Pokemon $pokemon): array
  {
    $mapper = $pokemon->toArray();

    return $mapper;
  }
}