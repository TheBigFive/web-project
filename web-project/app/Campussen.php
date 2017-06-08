<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Campussen extends Model
{
    public function alleCampussenOpvragen($id)
    {
      return DB::table('campussen')
      ->where('school_id', $id)
      ->get();
    }

    public function voegCampusToe($campus)
    {
      
      return DB::table('campussen')
      ->insert($campus);

    }

    public function verwijderCampus($id)
    {
      
      return DB::table('campussen')
      ->where('campus_id', $id)
      ->delete();

    }
}
