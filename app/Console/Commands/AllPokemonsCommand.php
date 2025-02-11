<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\AllPokemonsJob;
use App\Models\Pokemon\Pokemon;
use App\Services\Pokemon\PokemonService;

class AllPokemonsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-pokemons-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pokemons = [
      "Bulbasaur", "Ivysaur", "Venusaur", "Charmander", "Charmeleon", "Charizard",
      "Squirtle", "Wartortle", "Blastoise", "Caterpie", "Metapod", "Butterfree",
      "Weedle", "Kakuna", "Beedrill", "Pidgey", "Pidgeotto", "Pidgeot",
      "Rattata", "Raticate", "Spearow", "Fearow", "Ekans", "Arbok",
      "Pikachu", "Raichu", "Sandshrew", "Sandslash", "Nidorina",
      "Nidoqueen", "Nidorino", "Nidoking", "Clefairy", "Clefable",
      "Vulpix", "Ninetales", "Jigglypuff", "Wigglytuff", "Zubat", "Golbat",
      "Oddish", "Gloom", "Vileplume", "Paras", "Parasect", "Venonat",
      "Venomoth", "Diglett", "Dugtrio", "Meowth", "Persian", "Psyduck",
      "Golduck", "Mankey", "Primeape", "Growlithe", "Arcanine", "Poliwag",
      "Poliwhirl", "Poliwrath", "Abra", "Kadabra", "Alakazam", "Machop",
      "Machoke", "Machamp", "Bellsprout", "Weepinbell", "Victreebel", "Tentacool",
      "Tentacruel", "Geodude", "Graveler", "Golem", "Ponyta", "Rapidash",
      "Slowpoke", "Slowbro", "Magnemite", "Magneton", "Doduo",
      "Dodrio", "Seel", "Dewgong", "Grimer", "Muk", "Shellder", "Cloyster",
      "Gastly", "Haunter", "Gengar", "Onix", "Drowzee", "Hypno", "Krabby",
      "Kingler", "Voltorb", "Electrode", "Exeggcute", "Exeggutor", "Cubone",
      "Marowak", "Hitmonlee", "Hitmonchan", "Lickitung", "Koffing", "Weezing",
      "Rhyhorn", "Rhydon", "Chansey", "Tangela", "Kangaskhan", "Horsea",
      "Seadra", "Goldeen", "Seaking", "Staryu", "Starmie",
      "Scyther", "Jynx", "Electabuzz", "Magmar", "Pinsir", "Tauros",
      "Magikarp", "Gyarados", "Lapras", "Ditto", "Eevee", "Vaporeon",
      "Jolteon", "Flareon", "Porygon", "Omanyte", "Omastar", "Kabuto",
      "Kabutops", "Aerodactyl", "Snorlax", "Articuno", "Zapdos", "Moltres",
      "Dratini", "Dragonair", "Dragonite", "Mewtwo", "Mew"

    ];
        AllPokemonsJob::dispatch($pokemons);
    }
}
