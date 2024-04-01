<?php

namespace App\Models;

use App\Models\reparation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class facture extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'repairID',
        'additionalCharges',
        'totalAmout'
    ];

    public function reparation(){
        return $this->belongsTo(reparation::class);
    }
}
