<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePokemonRequest;
use App\Services\Pokemon\PokemonService;

class PokemonController extends Controller
{
  public function __construct(private PokemonService $pokemonService)
  {}

  public function store(StorePokemonRequest $request)
  {
    $data = $request->validated();
    $pokemon = $data['pokemon'];

    return $this->pokemonService->httpRequest($pokemon);
  }
}