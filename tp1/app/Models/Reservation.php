<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'codeReservation';
    public $timestamps = false;
    protected $table = 'reservation';
    protected $fillable= [
        'codeReservation',
        'dateReservation',
        'dateAller',
        'dateRetour'
    ];

}
