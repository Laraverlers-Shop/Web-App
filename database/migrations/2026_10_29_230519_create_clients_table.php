<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE clients (
                code_client VARCHAR(10) NOT NULL PRIMARY KEY,
                nom_client VARCHAR(255) NOT NULL,
                rue_client VARCHAR(255) NOT NULL,
                code_postal_client VARCHAR(20) NOT NULL,
                ville_client VARCHAR(255) NOT NULL,
                type_client VARCHAR(2) NOT NULL,
                remise_speciale DECIMAL(5, 2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,

                CONSTRAINT clients_type_check
                    CHECK (type_client IN ('PU', 'PA', 'LI', 'AS', 'DI')),

                CONSTRAINT clients_remise_check
                    CHECK (remise_speciale BETWEEN 0 AND 100)
            )
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};