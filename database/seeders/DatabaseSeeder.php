<?php
namespace Database\Seeders;

use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Commande;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Abdrahman',
            'email' => 'abdrahman@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Client::factory()->count(10)->create();
        Fournisseur::factory()->count(5)->create();
        Produit::factory()->count(25)->create();
        Commande::factory()->count(15)->create();
    }
}
