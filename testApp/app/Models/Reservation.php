<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HashFactory;
    protected $primaryKey = 'codeReservation';
    public $timestamps = false;

    protected $fillable= [
        'codeReservation',
        'dateReservation',
        'dateAller',
        'dateRetour'
    ];

}
