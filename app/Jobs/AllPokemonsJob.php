<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Jobs\PokemonJob;

class AllPokemonsJob implements ShouldQueue
{
    use Queueable;


    public function __construct(private array $pokemons)
    {
        
    }

    public function handle(): void
    {
        foreach ($this->pokemons as $pokemon){
            
            PokemonJob::dispatch($pokemon);
        }
    }
}
