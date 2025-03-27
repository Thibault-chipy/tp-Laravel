<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SauceReact extends Model
{
    use HasFactory;
    protected $table = 'sauce_reacts';
    public $incrementing = false;
    protected $primaryKey = ['userId', 'sauceId'];
    protected $keyType = 'string';

    public $timestamps = false;
    protected $fillable = ['idUser', 'sauceId', 'reaction'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function sauce()
    {
        return $this->belongsTo(Sauce::class, 'sauceId');
    }
}
