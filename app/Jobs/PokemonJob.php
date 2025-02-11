<?php

namespace App\Jobs;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\Pokemon\PokemonService;
use App\DTO\Pokemon\PokemonDTO;
use App\Models\Pokemon\Pokemon;


class PokemonJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $pokemon)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(PokemonService $pokemonService): void
    {
        //
        $data = new PokemonDTO($this->pokemon);
        $pokemonService->httpRequest($data);
    }
}
