<?php

namespace Database\Factories;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Commande::class;
    public function definition(): array
    {
        return [
            'code_client' => Client::factory(),
            'date_commande' => fake()->dateTimeBetween('-1 year', 'now'),
            'condition' => fake()->randomElement(['LIV', 'T30']),
        ];
    }
    public function configure(): static
    {
        return $this->afterCreating(function (Commande $commande) {
            $produits = Produit::inRandomOrder()->take(rand(1, 4))->get();

            if ($produits->isNotEmpty()) {
                foreach ($produits as $produit) {
                    $commande->produits()->attach($produit->code_produit, [
                        'quantite' => fake()->numberBetween(1, 5),
                    ]);
                }
            }
        });
    }
}
