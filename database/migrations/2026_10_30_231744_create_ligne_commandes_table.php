<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {

            $table->string('numero_commande', 10);
            $table->string('code_produit', 10);
            $table->unsignedInteger('quantite');

            $table->primary(['numero_commande', 'code_produit']);

            $table->foreign('numero_commande')
                ->references('numero_commande')
                ->on('commandes')
                ->cascadeOnDelete();

            $table->foreign('code_produit')
                ->references('code_produit')
                ->on('produits');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
