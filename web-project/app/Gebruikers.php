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
        'op_kot',
        'rol_id'
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
      return DB::table('gebruikers')
      ->join('rollen', 'gebruikers.rol_id', '=', 'rollen.rol_id')
      ->select('gebruikers.*', 'rollen.naam as rol_naam')
      ->get();
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

    public function geefRol($id){
      $rolGebruiker = DB::table('gebruikers')
      ->join('rollen', 'gebruikers.rol_id', '=', 'rollen.rol_id')
      ->select('rollen.naam')
      ->where('id', $id)
      ->get();

      return $rolGebruiker->first()->naam;
    }
      

}

