<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Interessegebieden extends Model
{
    public function alleInteressegebiedenOpvragen($id)
    {
      return DB::table('interessegebieden')
      ->join('media','interessegebieden.interessegebied_id','=','media.interessegebied_id')
      ->select('interessegebieden.*','media.link as media_link')
      ->where('interessegebieden.school_id', $id)
      ->get();
    }

    public function voegInteressegebiedToe($interessegebied)
    {
      
      return DB::table('interessegebieden')
      ->insertGetId($interessegebied);

    }

    public function verwijderInteressegebied($id)
    {
      
      return DB::table('interessegebieden')
      ->where('interessegebied_id', $id)
      ->delete();

    }
}
