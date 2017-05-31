<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bezienswaardigheden extends Model
{
    public function alleBezienswaardighedenOpvragen()
    {
      return DB::table('bezienswaardigheden')
      ->join('gebruikers', 'bezienswaardigheden.toegevoegddoor_id', '=', 'gebruikers.id')
      ->select('bezienswaardigheden.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam')
      ->get();
    }

    public function bezienswaardigheidOpvragenViaId($id)
    {
      return DB::table('bezienswaardigheden')
      ->where('bezienswaardigheid_id', $id)
      ->get();
    }

    public function voegBezienswaardigheidToe($bezienswaardigheid){
      return DB::table('bezienswaardigheden')
      ->insertGetId($bezienswaardigheid);
    }

    public function wijzigBezienswaardigheid($id,$bezienswaardigheid){
      return DB::table('bezienswaardigheden')
      ->where('bezienswaardigheid_id', $id)
      ->update($bezienswaardigheid);
    }

    public function verwijderbezienswaardigheid($id){
      return DB::table('bezienswaardigheden')
      ->where('bezienswaardigheid_id', $id)
      ->delete();
    }
}
