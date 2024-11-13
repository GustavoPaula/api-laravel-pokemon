<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
  public function __construct(private PokemonService $pokemonService)
  {}

  public function store(Request $request): array
  {
    $pokemon = $request['pokemon'];

    return $this->pokemonService->httpRequest($pokemon);
  }
}