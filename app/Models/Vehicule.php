<?php

namespace App\Models;

use App\Models\Client;
use App\Models\reparation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'make',
        'model',
        'fuelType',
        'registration',
        'clientID',
            ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function reparation(){
        return $this->hasOne(reparation::class);
    }
}
