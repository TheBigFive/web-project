<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Testimonials;
use App\Tags;
use Auth;
use Validator;
use Redirect;
use DateTime;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = new Testimonials();
        $alleTestimonials = $testimonial->alleTestimonialsOpvragen();

        return view('admin/testimonials/testimonials',
            ['alleTestimonials' => $alleTestimonials
            ]);
        
    }
    
    public function openToevoegenTestimonial()
    {
        $tag = new Tags();
        $alleTags = $tag->alleTagsOpvragen();


        return view('admin/testimonials/toevoegenTestimonial',
            ['alleTags' => $alleTags,
            ]);
        
    }

    public function voegTestimonialToe(Request $request)
    {
        $testimonial = new Testimonials();
        $testimonialId = Auth::id();
        /*$publicatieStatus = 'Nog niet gepubliceerd';*/
        $goedkeuringsstatus = 'Nieuw artikel';
        $datumEnTijd = new DateTime();

        $validated = Validator::make($request->all(), [
            'naam_persoon' => 'required',
            'beschrijving_persoon' => 'required',
          'titel' => 'required',
          'beschrijving_testimonial' => 'required'
        ]);

        if(!$validated->fails()){
            $testimonial->voegTestimonialToe([
                'naam_persoon' => $request->input('naam_persoon'),
                'beschrijving_persoon' => $request->input('beschrijving_persoon'),
                'titel' => $request->input('titel'),
                'beschrijving_testimonial' => $request->input('beschrijving_testimonial'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'toegevoegdop' => $datumEnTijd,
                'toegevoegddoor_id' => $gebruikersId,
            ]);
        }

        return redirect('/admin/testimonials/')->withErrors($validated); 
        
    }

    public function openWijzigingTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialsId = $id;

        $geopendeTestimonial = $testimonial->testimonialOpvragenViaId($testimonialsId)->first();
        
        return view('/admin/testimonials/wijzigTestimonial', 
            ['geopendeTestimonial' => $geopendeTestimonial,
            ]);
        
    }

    public function wijzigTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $goedkeuringsstatus = "Werd gewijzigd";

        $validated = Validator::make($request->all(), [
            'naam_persoon' => 'required',
            'beschrijving_persoon' => 'required',
          'titel' => 'required',
          'beschrijving_testimonial' => 'required'
        ]);

        if(!$validated->fails()){
            $testimonial->wijzigTestimonial($testimonialsId,[
                'naam_persoon' => $request->input('naam_persoon'),
                'beschrijving_persoon' => $request->input('beschrijving_persoon'),
                'titel' => $request->input('titel'),
                'beschrijving_testimonial' => $request->input('beschrijving_testimonial'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De testimonial werd gewijzigd');
        
    }

    public function verwijderTestimonial($id, Request $request){
        
        $testimonial = new Testimonials();
        $testimonialId = $id;    
        $testimonial->verwijderTestimonial($testimonialId);

        return redirect('/admin/testimonials');
        
    }

    public function openTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialsId = $id;

        $geopendeTestimonial = $testimonial->testimonialOpvragenViaId($testimonialsId)->first();
        
        return view('/admin/testimonials/openTestimonial', 
            ['geopendeTestimonial' => $geopendeTestimonial,
            ]);
        
    }

    public function goedkeurenTestimonial($id){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $datumEnTijd = new DateTime();
        $goedkeuringsstatus = 'Goedgekeurd';
     
        $testimonial->wijzigTestimonial($testimonialsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'goedgekeurdop' => $datumEnTijd
            ]);
        

        return Redirect::back()->with('succesBericht', 'De testimonial werd succsvol goedgekeurd.');
        
    }
    
    public function afwijzenTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $goedkeuringsstatus = 'Afgewezen';
        $goedgekeurdop = null;
/*
        $validated = Validator::make($request->all(), [
          'redenVanAfwijzing' => 'required',
        ]);

        if(!$validated->fails()){*/
            $testimonial->wijzigTestimonial($testimonialsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'redenVanAfwijzing' => $request->input('redenVanAfwijzing'),
                'goedgekeurdop' => $goedgekeurdop
            ]); 
        /*};*/        

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De testimonial werd succesvol afgewezen.');
        
    }

    public function publicerenTestimonial($id){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $datumEnTijd = new DateTime();
        $publicatieStatus = 'Gepubliceerd';
     
        $testimonial->wijzigTestimonial($testimonialsId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        $this->goedkeurenTestimonial($testimonialsId);

        return Redirect::back()->with('succesBericht', 'De testimonial werd succsvol gepubliceerd.');
        
    }

    public function offlineHalenTestimonial($id){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $datumEnTijd = null;
        $publicatieStatus = 'Nog niet gepubliceerd';
     
        $testimonial->wijzigTestimonial($testimonialsId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        return Redirect::back()->with('succesBericht', 'De testimonial werd succsvol offline gehaald.');
        
    }
    
}
