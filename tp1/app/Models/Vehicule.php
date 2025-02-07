<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $primaryKey = 'Matricule';
    protected $table = 'vehicule';
    public $timestamps = false;
    protected $fillable= [
        'Matricule',
        'Modele',
        'NombrePlace',
        'Prix',
        'Disponibilite'
    ]; 
}
