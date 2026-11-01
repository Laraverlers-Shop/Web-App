<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'code_client';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'code_client',
        'nom_client',
        'rue_client',
        'code_postal_client',
        'ville_client',
        'type_client',
        'remise_speciale',
    ];
}
