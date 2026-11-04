<?php

namespace Database\Factories;

use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fournisseur>
 */
class FournisseurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Fournisseur::class;
    public function definition(): array
    {
        return [
            'nom_fournisseur' => fake()->company(),
            'rue_fournisseur' => fake()->streetAddress(),
            'code_postal_fournisseur' => fake()->postcode(),
            'ville_fournisseur' => fake()->city(),
            'pays_fournisseur' => fake()->country(),
            'tel_fournisseur' => fake()->phoneNumber(),
            'contact_fournisseur' => fake()->name(),
        ];
    }
}
