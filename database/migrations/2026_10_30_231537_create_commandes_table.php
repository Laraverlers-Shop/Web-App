<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('numero_commande', 10)->primary();
            $table->date('date_commande');
            $table->enum('condition', ['LIV', 'T30']);
            $table->string('code_client', 10);

            $table->foreign('code_client')
                ->references('code_client')
                ->on('clients');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
