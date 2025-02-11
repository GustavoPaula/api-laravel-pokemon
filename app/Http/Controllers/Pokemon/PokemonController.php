<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePokemonRequest;
use App\Services\Pokemon\PokemonService;
use App\Jobs\AllPokemonsJob;

class PokemonController extends Controller
{
  public function __construct(private PokemonService $pokemonService)
  {}

  public function store(StorePokemonRequest $request)
  {
    $request->validated();
    $data = $request->getData();
    $responseData = $this->pokemonService->httpRequest($data);

    return response()->json($responseData, 201);
  }

}
