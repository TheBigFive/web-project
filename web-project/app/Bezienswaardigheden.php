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

    public function goedgekeurdeBezienswaardighedenOpvragen()
    {
      return DB::table('bezienswaardigheden')
      ->join('gebruikers', 'bezienswaardigheden.toegevoegddoor_id', '=', 'gebruikers.id')
      ->join('media','bezienswaardigheden.bezienswaardigheid_id','=','media.bezienswaardigheid_id')
      ->select('bezienswaardigheden.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam','media.link as media_link')
      ->where('isHoofdafbeelding', True)
      ->get();
    }

    public function bezienswaardigheidOpvragenViaId($id)
    {
      return DB::table('bezienswaardigheden')
      ->where('bezienswaardigheid_id', $id)
      ->join('gebruikers', 'bezienswaardigheden.toegevoegddoor_id', '=', 'gebruikers.id')
      ->select('bezienswaardigheden.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam')
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
