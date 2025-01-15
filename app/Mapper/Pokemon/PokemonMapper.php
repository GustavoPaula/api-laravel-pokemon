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
      // Reestrutura o array principal para organizar as informações do Pokémon
      $mapper = [
        'id' => $array['pokemon']['id'],
        'name' => $array['pokemon']['name'],
        'updated_at' => $array['pokemon']['updated_at'],
        'created_at' => $array['pokemon']['created_at'],
        // Processa a lista de habilidades do Pokémon
        'abilities' => array_map(function ($ability) {
            // Reestrutura cada habilidade individualmente
            return [
                'id' => $ability['id'],
                'name' => $ability['name'],
                'pokemon_id' => $ability['pokemon_id'],
                'created_at' => $ability['created_at'],
                'updated_at' => $ability['updated_at']
            ];
            // Aplica a função de transformação a cada habilidade no array de habilidades
        }, $array['abilities']['abilities'])
      ];

      return $mapper;
  }
}
