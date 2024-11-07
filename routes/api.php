<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', [TesteController::class, 'create']);
Route::get('/fetch', [TesteController::class, 'fetchPokemon']);
