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
      ->join('tags', 'nieuwsitems.tag_id', '=', 'tags.tag_id')
      ->join('media','nieuwsitems.nieuwsitem_id','=','media.nieuwsitem_id')
      ->where('isHoofdafbeelding', True)
      ->select('nieuwsitems.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam','tags.naam as tag_naam','media.link as media_link')
      ->get();
    }

    public function alleNieuwsitemsOpvragenVoorAdmin()
    {
      return DB::table('nieuwsitems')
      ->join('gebruikers', 'nieuwsitems.toegevoegddoor_id', '=', 'gebruikers.id')
      ->join('tags', 'nieuwsitems.tag_id', '=', 'tags.tag_id')
      ->select('nieuwsitems.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam','tags.naam as tag_naam')
      ->get();
    }

    public function nieuwsitemOpvragenViaId($id)
    {
      return DB::table('nieuwsitems')
      ->join('gebruikers', 'nieuwsitems.toegevoegddoor_id', '=', 'gebruikers.id')
      ->join('tags', 'nieuwsitems.tag_id', '=', 'tags.tag_id')
      ->select('nieuwsitems.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam','tags.naam as tag_naam')
      ->where('nieuwsitem_id', $id)
      ->get();
    }

    public function voegNieuwsitemToe($nieuwsitem){
      return DB::table('nieuwsitems')
      ->insertGetId($nieuwsitem);
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
