<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sauce extends Model
{
    use HasFactory;
    protected $primaryKey='idSauce';
    protected $fillable = [
        "userId",
        "name",
        "manufacturer",
        "description",
        "mainPepper",
        "imageUrl",
        "heat",
        "likes",
        "dislikes",
        "usersLiked",
        "usersDisliked"
    ];
    public $timestamps = false;

     // Relation avec la table utilisateur
     public function utilisateur()
     {
         return $this->belongsTo(User::class, 'userId');
     }

     // Relation avec la table reaction
        public function reactions(){
            return $this->hasMany(SauceReact::class);
        }
}
