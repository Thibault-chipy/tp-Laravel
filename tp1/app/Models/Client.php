<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory; 
    public $timestamps = false;
    protected $table = 'client'; 

    protected $fillable= [
        'NumClient',
        'Nom',
        'Email',
        'carteBancaire',
    ];
  


}
