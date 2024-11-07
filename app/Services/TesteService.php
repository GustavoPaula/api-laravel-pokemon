<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TesteService
{
    public function httpRequest(String $request)
    {
        $url = 'https://pokeapi.co/api/v2/pokemon/'.$request;
        $pokemon = Http::get($url);
        $mapper = [
            'atributos'=>$pokemon['abilities'][0]['ability']['name']
        ];
        return $mapper;
    }
}
