<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
    'id'          ,
	'firstName',
	'lastName',
	'address',
	'phoneNumber',



    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vehicle(){
        return $this->hasOne(Vehicule::class);
    }
}
