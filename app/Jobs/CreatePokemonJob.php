<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

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
