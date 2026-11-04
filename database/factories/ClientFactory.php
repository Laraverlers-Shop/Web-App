<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Client::class;
    
    public function definition(): array
    {
        return [
            'nom_client' => fake()->company(),
            'rue_client' => fake()->streetAddress(),
            'code_postal_client' => fake()->postcode(),
            'ville_client' => fake()->city(),
            'type_client' => fake()->randomElement(['PU', 'PA', 'LI', 'AS', 'DI']),
            'remise_speciale' => fake()->numberBetween(0, 15),
        ];
    }
}
