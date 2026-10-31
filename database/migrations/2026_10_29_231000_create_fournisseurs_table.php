<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->string('code_fournisseur', 10)->primary();
            $table->string('nom_fournisseur');
            $table->string('rue_fournisseur');
            $table->string('code_postal_fournisseur', 20);
            $table->string('ville_fournisseur');
            $table->string('pays_fournisseur')->nullable();
            $table->string('tel_fournisseur')->nullable();
            $table->string('contact_fournisseur')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
