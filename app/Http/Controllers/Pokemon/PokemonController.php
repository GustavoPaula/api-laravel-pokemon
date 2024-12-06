<?php

namespace App\Http\Controllers\Pokemon;

use App\DTO\Pokemon\PokemonDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePokemonRequest;
use App\Services\Pokemon\PokemonService;

class PokemonController extends Controller
{
  public function __construct(private PokemonService $pokemonService)
  {}

  public function store(StorePokemonRequest $request)
  {
    $request->validated();
    $data = $request->getData();

    return $this->pokemonService->httpRequest($data);
  }
}