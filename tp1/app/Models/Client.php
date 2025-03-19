<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory; 
    protected $table = 'Client'; 
    protected $primaryKey = 'numeroclient';
    public $timestamps = false;
    protected $fillable= [
        'nom',
        'email',
        'carteBancaire',
    ];
  


}
