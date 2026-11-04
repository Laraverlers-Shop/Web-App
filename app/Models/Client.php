<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasCode;

class Client extends Model
{
    use HasCode;

    public static string $codePrefix = 'Cli';

    protected $primaryKey = 'code_client';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nom_client',
        'rue_client',
        'code_postal_client',
        'ville_client',
        'type_client',
        'remise_speciale'
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'code_client');
    }
}