<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::post('/pokemon', [PokemonController::class, 'store']);