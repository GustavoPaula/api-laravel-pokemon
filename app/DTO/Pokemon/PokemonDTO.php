<?php

namespace App\DTO\Pokemon;

class PokemonDTO
{
  public function __construct(
    private string $pokemon
  ){}

  public static function create(array $data): self
  {
    return new self(
      $data['pokemon']
    );
  }

  public function getPokemon(): string
  {
    return $this->pokemon;
  }

  public function toArray(): array
  {
    return [
      'pokemon' => $this->pokemon
    ];
  }
}
