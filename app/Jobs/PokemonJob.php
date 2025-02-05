<?php

namespace App\Jobs;

use App\Models\Pokemon\Pokemon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PokemonJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $pokemon)
    {
        $this->onQueue("pokemon-job");
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->pokemon;
    }
}
