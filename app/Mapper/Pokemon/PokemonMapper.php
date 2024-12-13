<?php

namespace App\Mapper\Pokemon;

use Illuminate\Http\Client\Response;

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

  public static function fromDBToApi($pokemon, $abilities): array
  {
    $array = [
      'pokemon' => $pokemon->toArray(),
      'abilities' => $abilities->toArray()
    ];

    $mapper = [
      'id' => $array['pokemon']['id'],
      'name' => $array['pokemon']['name'],
      'updated_at' => $array['pokemon']['updated_at'],
      'created_at' => $array['pokemon']['created_at'],
      'abilities' => array_map(function ($ability){
        return $ability;
      }, $array['abilities'])
    ];

    return $mapper;
  }
}