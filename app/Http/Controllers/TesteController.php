<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TesteService;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public TesteService $testeService;

    public function __construct(TesteService $testeService)
    {
        $this->testeService = $testeService;
    }

    public function create()
    {
        dd('teste');
    }

    public function teste()
    {
        dd('teste');
    }

    public function fetchPokemon(Request $request)
    {
        $pokemon = $request['pokemon'];

        return $this->testeService->httpRequest($pokemon);
    }
}
