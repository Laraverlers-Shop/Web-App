<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasCode;
use Database\Factories\ProduitFactory;

class Produit extends Model
{
    use HasCode;
    use HasFactory;

    protected static function newFactory()
    {
        return ProduitFactory::new();
    }
    public static string $codePrefix = 'Pr';

    protected $primaryKey = 'code_produit';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'designation',
        'prix_unitaire',
        'famille',
        'code_fournisseur'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'code_fournisseur');
    }

    public function commandes()
    {
        return $this->belongsToMany(
            Commande::class,
            'ligne_commandes',
            'code_produit',
            'numero_commande'
        )->withPivot('quantite');
    }
}