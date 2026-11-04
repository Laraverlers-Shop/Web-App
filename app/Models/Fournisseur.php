<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasCode;
use Database\Factories\FournisseurFactory;

class Fournisseur extends Model
{
    use HasCode;
    use HasFactory;
    protected static function newFactory()
    {
        return FournisseurFactory::new();
    }
    public static string $codePrefix = 'Fr';

    protected $primaryKey = 'code_fournisseur';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nom_fournisseur',
        'rue_fournisseur',
        'code_postal_fournisseur',
        'ville_fournisseur',
        'pays_fournisseur',
        'tel_fournisseur',
        'contact_fournisseur'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'code_fournisseur');
    }
}