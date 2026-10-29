<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('code_client', 10)->primary();
            $table->string('nom_client');
            $table->string('rue_client');
            $table->string('code_postal_client', 20);
            $table->string('ville_client');
            $table->enum('type_client', ['PU', 'PA', 'LI', 'AS', 'DI']);
            $table->unsignedTinyInteger('remise_speciale')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};