<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
//use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Queue\SerializesModels;
use App\Jobs\PokemonJob;

class AllPokemonsJob implements ShouldQueue
{
    use Queueable;//, Serializes, ModelsDispatchable, InteractsWithQueue;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $pokemons)
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->pokemons as $pokemon) {
            PokemonJob::dispatch($pokemon);
        }
    }
}
