<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Nieuwsitems extends Model
{
    public function alleNieuwsitemsOpvragen()
    {
      return DB::table('nieuwsitems')
      ->join('gebruikers', 'nieuwsitems.toegevoegddoor_id', '=', 'gebruikers.id')
      ->select('nieuwsitems.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam')
      ->get();
    }

    public function nieuwsitemOpvragenViaId($id)
    {
      return DB::table('nieuwsitems')
      ->where('nieuwsitem_id', $id)
      ->get();
    }

    public function voegNieuwsitemToe($nieuwsitem){
      return DB::table('nieuwsitems')->insert($nieuwsitem);
    }

    public function wijzigNieuwsitem($id,$nieuwsitem){
      return DB::table('nieuwsitems')
      ->where('nieuwsitem_id', $id)
      ->update($nieuwsitem);
    }

    public function verwijderNieuwsitem($id)
    {
      return DB::table('nieuwsitems')
      ->where('nieuwsitem_id', $id)
      ->delete();
    }
}
