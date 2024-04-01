<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'id',
        'username',
        'password',
        'email',
        'isUser',
        'isMechanicien',
        'isAdmin',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function reparation()
    {
        return $this->hasOne(Reparation::class);
    }
}
