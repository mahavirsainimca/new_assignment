<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $guard = "customer";
    // protected $table = 'customers';

    protected $fillable = [
        'name', 'email', 'password','email_verified_at','remember_token',
    ];
}
