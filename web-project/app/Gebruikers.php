<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;

class Gebruikers extends Authenticatable
{
    use CanResetPassword;
    protected $table = 'gebruikers';

 /*   //Deze variabele is nodig want laravel denkt dat onze primary key "id" heet.
    protected $primaryKey = 'gebruiker_id';*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam', 
        'achternaam',
        'email',
        'password',
        'geboortedatum',
        'geslacht',
        'woonplaats',
        'profielfoto',
        'studentenclub',
        'op_kot'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

