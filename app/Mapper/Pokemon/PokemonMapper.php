<?php

namespace App\Mapper\Pokemon;

use Illuminate\Http\Client\Response;

class PokemonMapper
{
  public static function fromApiToDB(Response $pokemon): array
  {
    $array = json_decode($pokemon, TRUE);

    $mapper = [
      "Abilities" => array_map(function ($ability) {
        return $ability['ability']['name'];
      }, $array['abilities']),

      "Forms" => array_map(function ($form) {
        return $form;
      }, $array['forms'])
    ];

    return $mapper;
  }
}