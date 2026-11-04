<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasCode;
use Database\Factories\CommandeFactory;

class Commande extends Model
{
    use HasCode;
    use HasFactory;

    protected static function newFactory()
    {
        return CommandeFactory::new();
    }
    public static string $codePrefix = 'Com';

    protected $primaryKey = 'numero_commande';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'date_commande',
        'condition',
        'code_client'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'code_client');
    }

    public function produits()
    {
        return $this->belongsToMany(
            Produit::class,
            'ligne_commandes',
            'numero_commande',
            'code_produit'
        )->withPivot('quantite');
    }
}
