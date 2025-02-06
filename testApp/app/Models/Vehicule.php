<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HashFactory;
    protected $primaryKey = 'Matricule';
    public $timestamps = false;
    protected $fillable= [
        'Matricule',
        'Modele',
        'NombrePlace',
        'Prix',
        'Disponibilite'
    ]; 
}
