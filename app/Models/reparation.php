<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reparation extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'description',
        'status',
        'startdate',
        'enddate',
        'mechanicnotes',
        'clientnotes',
        'user_id',
        'vehicleid'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function facture(){
        return $this->hasOne(facture::class);
    }
}
