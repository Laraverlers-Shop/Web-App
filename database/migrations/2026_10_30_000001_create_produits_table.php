<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->string('code_produit', 10)->primary();
            $table->string('designation');
            $table->decimal('prix_unitaire', 10, 2);
            $table->enum('famille', ['PA', 'BU', 'FO', 'LI']);
            $table->string('code_fournisseur', 10);
            $table->foreign('code_fournisseur')->references('code_fournisseur')->on('fournisseurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
