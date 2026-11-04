<?php

namespace Database\Factories;

use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produit::class;
    public function definition(): array
    {
        return [
            'designation' => fake()->words(3, true),
            'prix_unitaire' => fake()->randomFloat(2, 10, 1000),
            'famille' => fake()->randomElement(['PA', 'BU', 'FO', 'LI']),
            'code_fournisseur' => Fournisseur::factory(),
        ];
    }
}
