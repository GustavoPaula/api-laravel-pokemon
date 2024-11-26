<?php

namespace App\Mapper\Pokemon;

use Illuminate\Http\Client\Response;

class PokemonMapper
{
  public static function fromApiToDB(Response $pokemon): array
  {
    $array = json_decode($pokemon, TRUE);

    $mapper = [
      "Forms" => array_map(function ($form) {
        return [
          'name' => $form['name']
        ];
      }, $array['forms']),

      "Abilities" => array_map(function ($ability) {
        return [
          "ability" => $ability['ability']['name']
        ];
      }, $array['abilities']),
    ];

    return $mapper;
  }
}