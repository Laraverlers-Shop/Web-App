<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE produits (
                code_produit VARCHAR(9) NOT NULL PRIMARY KEY,
                designation VARCHAR(255) NOT NULL,
                prix_unitaire DECIMAL(10, 2) NOT NULL,
                famille VARCHAR(2) NOT NULL,
                code_fournisseur VARCHAR(9) NOT NULL,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,

                CONSTRAINT produits_prix_check
                    CHECK (prix_unitaire >= 0),

                CONSTRAINT produits_famille_check
                    CHECK (famille IN ('PA', 'BU', 'FO', 'LI')),

                CONSTRAINT produits_fournisseur_fk
                    FOREIGN KEY (code_fournisseur)
                    REFERENCES fournisseurs (code_fournisseur)
                    ON DELETE RESTRICT
            )
        ");

        DB::statement("
            CREATE INDEX produits_fournisseur_index
            ON produits (code_fournisseur)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};