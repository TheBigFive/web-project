<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Testimonials extends Model
{
    public function alleTestimonialsOpvragen()
    {
      return DB::table('testimonials')
      ->join('gebruikers', 'testimonials.toegevoegddoor_id', '=', 'gebruikers.id')
      ->select('testimonials.*', 'gebruikers.voornaam as toegevoegddoor_voornaam','gebruikers.achternaam as toegevoegddoor_achternaam')
      ->get();
    }

    public function testimonialOpvragenViaId($id)
    {
      return DB::table('testimonials')
      ->where('testimonial_id', $id)
      ->get();
    }

    public function voegTestimonialToe($testimonial){
      return DB::table('testimonials')->insert($testimonial);
    }

    public function wijzigTestimonial($id,$testimonial){
      return DB::table('testimonials')
      ->where('testimonial_id', $id)
      ->update($testimonial);
    }

    public function verwijderTestimonial($id)
    {
      return DB::table('testimonials')
      ->where('testimonial_id', $id)
      ->delete();
    }
}