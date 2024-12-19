<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    public function getJWTIdentifier()
    {
        return $this->getKey();  // Returns the user's primary key (ID)
    }

    public function getJWTCustomClaims()
    {
        return [];  // Custom claims for JWT if needed
    }

    protected $fillable = [
        'name', 'email',
    ];

    protected $hidden = [
        'password',
    ];
}
