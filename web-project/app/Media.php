<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function alleMediaOpvragen(){
      return DB::table('media')
      ->get();
    }

    public function nieuwsitemMediaOphalenViaId($id)
    {
      return DB::table('media')
      ->where('media_id', $id)
      ->get();
    }

    public function nieuwsitemMediaOphalenViaNieuwsitemId($id)
    {
      return DB::table('media')
      ->where('nieuwsitem_id', $id)
      ->get();
    }

    public function nieuwsitemMediaOphalenViaNieuwsitemIsHoofdafbeelding()
    {
      return DB::table('media')
      ->where('isHoofdafbeelding', '1')
      ->get();
    }

    public function testimonialMediaOphalenViaId($id)
    {
      return DB::table('media')
      ->where('media_id', $id)
      ->get();
    }

    public function testimonialMediaOphalenViaTestimonialId($id)
    {
      return DB::table('media')
      ->where('testimonial_id', $id)
      ->get();
    }

    public function bezienswaardigheidMediaOphalenViabezienswaardigheidId($id)
    {
      return DB::table('media')
      ->where('bezienswaardigheid_id', $id)
      ->get();
    }

    public function bezienswaardigheidMediaOphalenViaId($id)
    {
      return DB::table('media')
      ->where('media_id', $id)
      ->get();
    }
    

    public function voegMediaToe($media)
    {
      
      return DB::table('media')
      ->insert($media);

    }

    public function verwijderMedia($id)
    {
      
      return DB::table('media')
      ->where('media_id', $id)
      ->delete();

    }
}
