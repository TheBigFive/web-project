<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Scholen extends Model
{

    public function alleScholenOpvragen()
    {
      return DB::table('scholen')
      ->join('media','scholen.school_id','=','media.school_id')
      ->select('scholen.*','media.link as media_link')
      ->where('media.mediaType',"Afbeelding")
      ->get();
    }

    public function schoolOpvragenViaId($id)
    {
      return DB::table('scholen')
      ->join('gebruikers', 'scholen.toegevoegddoor_id', '=', 'gebruikers.id')
      ->select('scholen.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam')
      ->where('school_id', $id)
      ->get();
    }

    public function voegschoolToe($school){
      return DB::table('scholen')
      ->insertGetId($school);
    }

  
    public function wijzigSchool($id, $school){
      return DB::table('scholen')
      ->where('school_id', $id)
      ->update($school);
    }

    public function verwijderschool($id)
    {
      return DB::table('scholen')
      ->where('school_id', $id)
      ->delete();
    }
  
}
