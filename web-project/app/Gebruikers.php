<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Gebruikers extends Authenticatable
{
    protected $table = 'gebruikers';

 /*   //Deze variabele is nodig want laravel denkt dat onze primary key "id" heet.
    protected $primaryKey = 'gebruiker_id';*/

    /**b
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

    public function alleGebruikersOpvragen()
    {
      return DB::table('gebruikers')->get();
    }

    public function verwijderGebruiker($id)
    {
      return DB::table('gebruikers')
      ->where('id', $id)
      ->delete();
    }

    public function gebruikerViaIdOpvragen($id){
      return DB::table('gebruikers')
        ->where('id', $id)
        ->get();
    }

    public function wijzigGebruiker($id, $gebruiker)
    {
      return DB::table('gebruikers')
      ->where('id', $id)
      ->update($gebruiker);
    }

    public function zoekGebruikerViaNaam($naam){
      return DB::table('gebruikers')
        ->where('voornaam', 'like','%'.$naam.'%')
        ->orWhere('achternaam', 'like','%'.$naam.'%')
        ->get();
    }
}

