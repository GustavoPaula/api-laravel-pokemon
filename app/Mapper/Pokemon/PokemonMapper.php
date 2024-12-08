<?php

namespace App\Mapper\Pokemon;

use Illuminate\Database\Eloquent\Relations\HasMany;
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

  public static function fromDbToApi(HasMany $pokemon):array
  {
    return $pokemon->HasMany(PokemonMapper::class, 'pokemon_id', 'id');
  }
}
