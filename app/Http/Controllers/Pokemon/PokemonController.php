<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Services\Pokemon\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
  public function __construct(private PokemonService $pokemonService)
  {}

  public function store(Request $request)
  {
    $pokemon = $request['pokemon'];

    return $this->pokemonService->httpRequest($pokemon);
  }
}