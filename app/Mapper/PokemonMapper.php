<?php

namespace App\Mapper;

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

      "Cries" => array_map(function ($cry) {
        return $cry;
      }, $array['cries']),

      "Forms" => array_map(function ($form) {
        return $form;
      }, $array['forms']),

      "Games Indices" => array_map(function ($gameIndice) {
        return [
          "Game Index" => $gameIndice['game_index'],
          "Version Name" => $gameIndice['version']['name']
        ];
      }, $array['game_indices'])
    ];

    return $mapper;
  }
}

// $mapper = [
//   'Abilities'=>[
//     'name'=>$pokemon['abilities'][0]['ability']['name'],
//     'url'=>$pokemon['abilities'][0]['ability']['url'],
//   ],
//   'Cries'=>[
//     'latest'=>$pokemon['cries']['latest'],
//     'legacy'=>$pokemon['cries']['legacy']
//     ]
// ];