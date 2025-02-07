<?php

namespace App\Jobs;

use App\Models\Pokemon\Pokemon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\DTO\Pokemon\PokemonDTO;
use App\Services\Pokemon\PokemonService;

class PokemonJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $pokemon)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(PokemonService $pokemonService): void
    {
        $pokemonDTO = new PokemonDTO($this->pokemon);
        $pokemonService->httpRequest($pokemonDTO);
    }
}
