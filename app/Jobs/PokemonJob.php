<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
//use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Queue\SerializesModels;
use App\Services\Pokemon\PokemonService;
use App\DTO\Pokemon\PokemonDTO;

class PokemonJob implements ShouldQueue
{
    use Queueable;//, SerializesModels, Dispatchable, InteractsWithQueue;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $pokemon)
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $array = [
            "pokemon" => $this->pokemon
        ];
        
        $data = PokemonDTO::create($array);
        $pokemonService = app(PokemonService::class);
        $pokemonService->httpRequest($data);
    }
}
