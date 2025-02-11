<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pokemon\PokemonController;

Route::post('/pokemon', [PokemonController::class, 'store']);
