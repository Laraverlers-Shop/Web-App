<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE ligne_commandes (
                numero_commande VARCHAR(10) NOT NULL,
                code_produit VARCHAR(9) NOT NULL,
                quantite INTEGER NOT NULL,

                PRIMARY KEY (numero_commande, code_produit),

                CONSTRAINT ligne_commandes_quantite_check
                    CHECK (
                        quantite > 0
                        AND quantite = CAST(quantite AS INTEGER)
                    ),

                CONSTRAINT ligne_commandes_commande_fk
                    FOREIGN KEY (numero_commande)
                    REFERENCES commandes (numero_commande)
                    ON DELETE CASCADE,

                CONSTRAINT ligne_commandes_produit_fk
                    FOREIGN KEY (code_produit)
                    REFERENCES produits (code_produit)
                    ON DELETE RESTRICT
            )
        ");

        DB::statement("
            CREATE INDEX ligne_commandes_produit_index
            ON ligne_commandes (code_produit)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};