<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Pokemon\Ability;
use App\Models\Pokemon\Pokemon;
use App\Services\Pokemon\PokemonService;
use App\Providers\AppServiceProvider;

class CreatePokemonJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $pokemon)
    {
        $this->onQueue('pokemon');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->pokemon;
    }
}
