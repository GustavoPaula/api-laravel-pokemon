<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
  public PokemonService $pokemonService;

  public function __construct(PokemonService $pokemonService)
  {
    $this->pokemonService = $pokemonService;
  }

  public function store(Request $request)
  {
    $pokemon = $request['pokemon'];

    return $this->pokemonService->httpRequest($pokemon);
  }
}