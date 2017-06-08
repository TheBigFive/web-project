<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Testimonials;
use App\Tags;
use App\Media;
use Auth;
use Validator;
use Redirect;
use DateTime;
use Input;

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
    
    //Deze functie wordt uitgevoerd bij het openen van de pagina testimonial
    public function openTestimonial($id){

       
        $testimonial = new Testimonials();
        $testimonialId = $id;

        $geopendeTestimonial = $testimonial->testimonialOpvragenViaId($testimonialId)->first();

        $media = new Media;
        $alleTestimonialMedia = $media->testimonialMediaOphalenViaTestimonialId($testimonialId);


        return view('user/testimonial', 
            ['geopendeTestimonial' => $geopendeTestimonial,
            'alleTestimonialMedia' => $alleTestimonialMedia
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
        $gebruikersId = Auth::id();
        $publicatieStatus = 'Nog niet gepubliceerd';
        $goedkeuringsstatus = 'Nieuwe testimonial';
        $datumEnTijd = new DateTime();

        $media = new Media();

        $validator = Validator::make($request->all(), [
            'titel' => 'required',
            'naam_persoon' => 'required',
            'leeftijd_persoon' => 'required',
            'functie_persoon' => 'required',
            'tekstvorm_testimonial' => 'required',
            'afbeeldingen' => 'required'
        ]);

        if($validator->passes()){
            $testimonialId = $testimonial->voegTestimonialToe([
                'titel' => $request->input('titel'),
                'naam_persoon' => $request->input('naam_persoon'),
                'leeftijd_persoon' => $request->input('leeftijd_persoon'),
                'functie_persoon' => $request->input('functie_persoon'),
                'beschrijving_persoon' => $request->input('beschrijving_persoon'),                
                'tekstvorm_testimonial' => $request->input('tekstvorm_testimonial'),
                'publicatieStatus' => $publicatieStatus,
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'toegevoegdop' => $datumEnTijd,
                'toegevoegddoor_id' => $gebruikersId,
                'tag_id' => $request->input('tag'),
            ]);

            //Toevoegen van afbeeldingen 
            if(Input::file('afbeeldingen')){
                $afbeeldingen = Input::file('afbeeldingen');
                foreach ($afbeeldingen as $key => $afbeelding) {
                    $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                    $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                    if($validator->passes()){  

                        $afbeeldingNaam = 'testimonial-'.$testimonialId.'-'.str_random(5).$afbeelding->getClientOriginalName();
                        $afbeelding->move('img/testimonials/', $afbeeldingNaam);
                        $filePath = 'img/testimonials/'.$afbeeldingNaam;
                        $mediaType = "Afbeelding";


                        if($key == 0){
                            //Afbeelding toevoegen in de database met eerste afbeelding als hoofdafbeelding
                            $isHoofdafbeelding = true;
                            $media->voegMediaToe([
                            'link' => $filePath,
                            'mediaType' => $mediaType,
                            'testimonial_id' => $testimonialId,
                            'isHoofdafbeelding' => $isHoofdafbeelding 
                            ]);

                        } else{
                            //Afbeelding toevoegen in de database
                            $media->voegMediaToe([
                            'link' => $filePath,
                            'mediaType' => $mediaType,
                            'testimonial_id' => $testimonialId
                            ]);

                        }
                        
                    }else{
                        return "tis ni valid";
                    }
                }
            }else{
                return "Niks in afbeeldingen";
            }

            $youtubelink = $request->input('video');
            $mediaType = "Video";

            if($youtubelink != ''){
                $validator = Validator::make(array('video' => $youtubelink), [
                    'video' => 'sometimes|required',
                ]);
                if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $youtubelink, $id)) {
                  $videoId = $id[1];
                } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $youtubelink, $id)) {
                  $videoId = $id[1];
                } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $youtubelink, $id)) {
                  $videoId = $id[1];
                } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $youtubelink, $id)) {
                  $videoId = $id[1];
                }
                else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $youtubelink, $id)) {
                    $videoId = $id[1];
                } else {   
                    // not an youtube video
                    return Redirect::back()->withErrors($validator)->with('foutmelding', 'De link die u meegaf is geen youtubelink');
                }

                //youtubelink toevoegen in de database
                $media->voegMediaToe([
                'link' => $videoId,
                'mediaType' => $mediaType,
                'testimonial_id' => $testimonialId
                ]);
            }

            return redirect('/admin/testimonials/');
        }else{
            return Redirect::back()->withErrors($validator); 
        }        
        
    }

    public function openWijzigingTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialId = $id;
        $tag = new Tags();
        $media = new Media();
        $aantalAfbeeldingen = 0;
        $aantalVideos = 0;

        $geopendeTestimonial = $testimonial->testimonialOpvragenViaId($testimonialId)->first();
        $alleTags = $tag->alleTagsOpvragen();
        $alleTestimonialMedia = $media->TestimonialMediaOphalenViaTestimonialId($testimonialId);

        foreach ($alleTestimonialMedia as $key => $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "Video"){
                $aantalVideos++;
            }
        }

        return view('/admin/testimonials/wijzigTestimonial', 
            ['geopendeTestimonial' => $geopendeTestimonial,
            'alleTags' => $alleTags,
            'alleTestimonialMedia' => $alleTestimonialMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'aantalVideos' => $aantalVideos
            ]);
        
    }

    public function wijzigTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialId = $id;
        $goedkeuringsstatus = "Werd gewijzigd";

        $validated = Validator::make($request->all(), [
            'titel' => 'required',
            'naam_persoon' => 'required',
            'leeftijd_persoon' => 'required',
            'functie_persoon' => 'required',
            'beschrijving_persoon' => 'required',
            'tekstvorm_testimonial' => 'required',
        ]);

        if(!$validated->fails()){
            $testimonial->wijzigTestimonial($testimonialId,[
                'titel' => $request->input('titel'),
                'naam_persoon' => $request->input('naam_persoon'),
                'leeftijd_persoon' => $request->input('leeftijd_persoon'),
                'functie_persoon' => $request->input('functie_persoon'),
                'beschrijving_persoon' => $request->input('beschrijving_persoon'),                
                'tekstvorm_testimonial' => $request->input('tekstvorm_testimonial'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'tag_id' => $request->input('tag'),
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De testimonial werd gewijzigd');
        
    }

    public function verwijderTestimonial($id, Request $request){
        
        $testimonial = new Testimonials();
        $testimonialId = $id;    

        //media dat in de folder wordt geplaatst moet ook verwijderd worden
        $media = new Media();
        $testimonialMedia = $media->testimonialMediaOphalenViaTestimonialId($testimonialId);

        if(sizeof($testimonialMedia) >0){
            foreach ($testimonialMedia as $media) {
                if($media->mediaType == "Afbeelding"){
                    $filePath = $media->link;
                    unlink($filePath);
                }
            } 
        }

        $testimonial->verwijderTestimonial($testimonialId);



        return redirect('/admin/testimonials');
        
    }

    public function openTestimonialAdmin($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialId = $id;
        $aantalAfbeeldingen = 0;
        $aantalVideos = 0;

        $geopendeTestimonial = $testimonial->testimonialOpvragenViaId($testimonialId)->first();

        $media = new Media;
        $alleTestimonialMedia = $media->testimonialMediaOphalenViaTestimonialId($testimonialId);

        foreach ($alleTestimonialMedia as $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "Video"){
                $aantalVideos++;
            }
        }
        
        return view('/admin/testimonials/openTestimonial', 
            ['geopendeTestimonial' => $geopendeTestimonial,
            'alleTestimonialMedia' => $alleTestimonialMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'aantalVideos' => $aantalVideos
            ]);
        
    }

    public function goedkeurenTestimonial($id){

        $testimonial = new Testimonials();
        $testimonialsId = $id;
        $datumEnTijd = new DateTime();
        $goedkeuringsstatus = 'Goedgekeurd';
        $redenVanAfwijzing = null;
     
        $testimonial->wijzigTestimonial($testimonialsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'goedgekeurdop' => $datumEnTijd,
                'redenVanAfwijzing' => $redenVanAfwijzing
            ]);
        

        return Redirect::back()->with('succesBericht', 'De testimonial werd succsvol goedgekeurd.');
        
    }
    
    public function afwijzenTestimonial($id, Request $request){

        $testimonial = new Testimonials();
        $testimonialId = $id;
        $goedkeuringsstatus = 'Afgewezen';
        $goedgekeurdop = null;

        $validator = Validator::make($request->all(), [
          'redenVanAfwijzing' => 'required',
        ]);

        if($validator->passes()){
            $testimonial->wijzigTestimonial($testimonialId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'redenVanAfwijzing' => $request->input('redenVanAfwijzing'),
                'goedgekeurdop' => $goedgekeurdop
            ]); 

            $this->offlineHalenTestimonial($testimonialId);
        };        

        return Redirect::back()->withErrors($validator)->with('succesBericht', 'De testimonial werd succesvol afgewezen.');
        
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

        return Redirect::back()->with('succesBericht', 'De testimonial werd succesvol offline gehaald.');
        
    }

    public function toevoegenMediaTestimonial($id, Request $request){

        $media = new Media();
        $testimonialId = $id;


        if(Input::file('afbeeldingen')){
            $afbeeldingen = Input::file('afbeeldingen');
            foreach ($afbeeldingen as $afbeelding) {
                $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                if($validator->passes()){  
                    $mediaType = "Afbeelding";
                    $afbeeldingNaam = 'testimonial-'.$testimonialId.'-'.str_random(5).$afbeelding->getClientOriginalName();
                    $afbeelding->move('img/testimonials/', $afbeeldingNaam);
                    $filePath = 'img/testimonials/'.$afbeeldingNaam;
                        
                    //Afbeelding toevoegen in de database
                    $media->voegMediaToe([
                    'link' => $filePath,
                    'mediaType' => $mediaType,
                    'testimonial_id' => $testimonialId
                    ]);
                }
            }
        }

        $youtubelink = $request->input('video');
        $mediaType = "Video";

        if($youtubelink != ''){
            $validator = Validator::make(array('video' => $youtubelink), [
                'video' => 'sometimes|required',
            ]);

            if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $youtubelink, $id)) {
                $videoId = $id[1];
            } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $youtubelink, $id)) {
                $videoId = $id[1];
            } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $youtubelink, $id)) {
                $videoId = $id[1];
            } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $youtubelink, $id)) {
                $videoId = $id[1];
            }
            else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $youtubelink, $id)) {
                $videoId = $id[1];
            } else {   
                // not an youtube video
                return Redirect::back()->withErrors($validator)->with('foutmelding', 'De link die u meegaf is geen youtbelink');
            }

            //youtubelink toevoegen in de database
            $media->voegMediaToe([
            'link' => $videoId,
            'mediaType' => $mediaType,
            'testimonial_id' => $testimonialId
            ]);
        }

        return Redirect::back()->withErrors($validator);
    }

    public function verwijderMediaTestimonial($id){

        $mediaId = $id;
        $media = new Media();
        $opgehaaldeMedia = $media->testimonialMediaOphalenViaId($mediaId)->first();

        //Afbeelding moet locaal ook verwijderd worden
        if($opgehaaldeMedia->mediaType == "Afbeelding"){

            if($opgehaaldeMedia->isHoofdafbeelding){

                return Redirect::back()->with('hoofdafbeeldingmelding','Een hoofdafbeelding kan niet verwijderd worden. Stel eerst een ander afbeelding in als hoofdafbeelding.');
            }

            $filePath = $media->testimonialMediaOphalenViaId($mediaId)->first()->link;
            $media->verwijderMedia($mediaId);
            unlink($filePath);
        }
        elseif ($opgehaaldeMedia->mediaType == "Video")
        {
            $media->verwijderMedia($mediaId);
        }

        return Redirect::back();
    }

    public function stelHoofdafbeeldingIn($id){
        $media = new Media;
        $mediaId = $id;

        $inTeStellenMedia =  $media->testimonialMediaOphalenViaId($mediaId)->first();
        $geopendeTestimonialId = $inTeStellenMedia->testimonial_id;

        $alleTestimonialMedia = $media->testimonialMediaOphalenViaTestimonialId($geopendeTestimonialId);

        //De afbeelding die ervoor hoofdafbeelding was, niet meer instellen als hoofdafbeelding
        foreach ($alleTestimonialMedia as $afbeelding) {
            if($afbeelding->isHoofdafbeelding){
                $afbeeldingId = $afbeelding->media_id;

                $media->wijzigMedia($afbeeldingId,[
                    'isHoofdafbeelding' => false
                    ]);
            }
        }

        //Nieuwe afbeelding als hoofdafbeelding instellen
        $media->wijzigMedia($mediaId,[
                'isHoofdafbeelding' => true
            ]);

        return Redirect::back();


    }
    
}
