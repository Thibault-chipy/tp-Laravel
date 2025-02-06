<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HashFactory;
    public $timestamps = false;

    protected $fillable= [
        'NumClient',
        'Nom',
        'Email',
        'carteBancaire',
    ];

}
