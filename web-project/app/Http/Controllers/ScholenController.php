<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Scholen;
use App\Campussen;
use App\Interessegebieden;
use App\Media;
use Auth;
use Validator;
use Redirect;
use DateTime;
use Input;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class ScholenController extends Controller
{
    public function index()
    {
        $school = new Scholen();
        $alleScholen = $school->alleScholenOpvragen();

        $aantalNieuweEnGewijzigdeScholen = 0;

        foreach($alleScholen as $school){
            if($school->goedkeuringsstatus == "Nieuwe school" || $school->goedkeuringsstatus == "Gewijzigd"){
                $aantalNieuweEnGewijzigdeScholen++;
            }

        }

        return view('admin/scholen/scholen',
            ['alleScholen' => $alleScholen,
            'aantalNieuweEnGewijzigdeScholen' => $aantalNieuweEnGewijzigdeScholen
            ]);
    }

    //Deze functie wordt uitgevoerd bij het openen van de pagina nieuwsberichten
    public function openSchool($id){

        $school = new Scholen();
        $scholenId = $id;

        $media = new Media();
        $alleSchoolMedia = $media->schoolMediaOphalenViaSchoolId($scholenId);

        $geopendeSchool = $school->schoolOpvragenViaId($scholenId)->first();

        $interessegebied = new Interessegebieden();
        $alleInteressegebieden = $interessegebied->alleInteressegebiedenOpvragen($scholenId);
        
        return view('user/school', 
            ['geopendeSchool' => $geopendeSchool,
            'alleSchoolMedia' => $alleSchoolMedia,
            'alleInteressegebieden' => $alleInteressegebieden
            ]);
        
    }

    public function ophalenSchool()
    {
        $school = new Scholen();
        $alleScholen = $school->alleScholenOpvragen();
        return view('user/scholen',
            ['alleScholen' => $alleScholen
            ]);
    }
    
    public function openToevoegenschool()
    {

        return view('admin/scholen/toevoegenschool');
        
    }

    public function voegSchoolToe(Request $request)
    {
        $school = new Scholen();
        $gebruikersId = Auth::id();
        $publicatieStatus = 'Nog niet gepubliceerd';
        $goedkeuringsstatus = 'Nieuwe school';
        $datumEnTijd = new DateTime();

        $validator = Validator::make($request->all(), [
          'naam' => 'required',
          'beschrijving' => 'required',
          'website' => 'required',
        ]);

        if($validator->passes()){
            $school_id = $school->voegschoolToe([
                'naam' => $request->input('naam'),
                'beschrijving' => $request->input('beschrijving'),
                'website' => $request->input('website'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'publicatieStatus' => $publicatieStatus,
                'toegevoegddoor_id' => $gebruikersId,
                'toegevoegdop' => $datumEnTijd
            ]);

            $logo = Input::file('logo');
            $afbeelding = Input::file('afbeelding');

            if($logo){

                $validator = $this->logoToevoegen($school_id, $logo);
            }

            if($afbeeldingen){
                $validator = $this->afbeeldingToevoegen($school_id, $afbeelding);
            }

             return redirect('/admin/scholen/')->withErrors($validator);

        } else{
            return Redirect::back()->withErrors($validator);
        }

       

    }

   public function logoToevoegen($school_id, $logo){

        $media = new Media();

        $regels = array('logo' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
        $validator = Validator::make(array('logo'=> $logo), $regels);
             
        if($validator->passes()){  
            $mediaType = "schoolLogo";
            $afbeeldingNaam = 'school-'.$school_id.'-'.str_random(5).$logo->getClientOriginalName();
            $logo->move('img/scholen/', $afbeeldingNaam);
            $filePath = 'img/scholen/'.$afbeeldingNaam;
                        
            //Afbeelding toevoegen in de database
            $media->voegMediaToe([
                'link' => $filePath,
                'mediaType' => $mediaType,
                'school_id' => $school_id
            ]);
        
        }

        return $validator;

    }

    public function afbeeldingToevoegen($school_id, $afbeelding){

        $media = new Media();

        $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
        $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
        if($validator->passes()){  
            $mediaType = "Afbeelding";
            $afbeeldingNaam = 'school-'.$school_id.'-'.str_random(5).$afbeelding->getClientOriginalName();
            $afbeelding->move('img/scholen/', $afbeeldingNaam);
            $filePath = 'img/scholen/'.$afbeeldingNaam;
                        
            //Afbeelding toevoegen in de database
            $media->voegMediaToe([
            'link' => $filePath,
            'mediaType' => $mediaType,
            'school_id' => $school_id
            ]);

        } else{
            return "het passeert ni";
        }
        

        return $validator;

    }


    public function toevoegenMediaSchool($id,Request $request){
        $media = new Media();
        $school_id = $id;

        $logo = Input::file('logo');
        $afbeelding = Input::file('afbeelding');

            if($logo){
                $alleSchoolMedia = $media->schoolMediaOphalenViaSchoolId($school_id);                
                foreach ($alleSchoolMedia as $key => $media) {
                    if ($media->mediaType == "schoolLogo"){
                        $teVerwijderenMediaId = $media->media_id;
                       
                    }
                }
                $validator = $this->logoToevoegen($school_id, $logo);
                $this->afbeeldingVerwijderen($teVerwijderenMediaId);
            }

            if($afbeelding){
                $alleSchoolMedia = $media->schoolMediaOphalenViaSchoolId($school_id);                
                foreach ($alleSchoolMedia as $key => $media) {
                    if ($media->mediaType == "Afbeelding"){
                        $teVerwijderenMediaId = $media->media_id;
                       
                    }
                }
                $validator = $this->afbeeldingToevoegen($school_id, $afbeelding);
                $this->afbeeldingVerwijderen($teVerwijderenMediaId);
            }

        return redirect('/admin/scholen/wijzig/'.$school_id)->withErrors($validator)->with('succesBericht', 'De afbeelding werd succesvol toegevoegd.');
    }

    public function afbeeldingVerwijderen($id){

        $mediaId = $id;
        $media = new Media();
        $opgehaaldeMedia = $media->schoolMediaOphalenViaId($mediaId)->first();

        if($opgehaaldeMedia->mediaType == "Afbeelding" || $opgehaaldeMedia->mediaType == "schoolLogo"){
            $filePath = $media->schoolMediaOphalenViaId($mediaId)->first()->link;
            $media->verwijderMedia($mediaId);
            unlink($filePath);
        }

        return Redirect::back()->with('succesBericht', 'De vorige afbeelding werd verwijderd.');
    }
    
    public function openWijzigingschool($id, Request $request){

        $school = new scholen();
        $scholenId = $id;
        $media = new Media();

        $geopendeSchool = $school->schoolOpvragenViaId($scholenId)->first();
        $alleSchoolMedia = $media->schoolMediaOphalenViaSchoolId($scholenId);
        
        return view('/admin/scholen/wijzigSchool', 
            ['geopendeSchool' => $geopendeSchool,
            'alleSchoolMedia' => $alleSchoolMedia,
            ]);
        
    }

    public function wijzigSchool($id, Request $request){

        $school = new scholen();
        $scholenId = $id;
        $goedkeuringsstatus = "Werd gewijzigd";

        $validator = Validator::make($request->all(), [
          'naam' => 'required',
          'beschrijving' => 'required',
          'website' => 'required',
        ]);

        if($validator->passes()){
            $school->wijzigSchool($scholenId,[
                'naam' => $request->input('naam'),
                'beschrijving' => $request->input('beschrijving'),
                'website' => $request->input('website'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
            ]);
        }

        return Redirect::back()->withErrors($validator)->with('succesBericht', 'Het artikel werd gewijzigd');
        
    }

    public function verwijderSchool($id){
        
        $school = new scholen();
        $schoolId = $id;

        //media dat in de folder wordt geplaatst moet ook verwijderd worden
        $media = new Media();
        $schoolMedia = $media->schoolMediaOphalenViaschoolId($schoolId);

        if(sizeof($schoolMedia) >0){
            foreach ($schoolMedia as $media) {
                if($media->mediaType == "Afbeelding" || $media->mediaType == "schoolLogo"){
                    $filePath = $media->link;
                    unlink($filePath);
                }
            } 
        }
        $school->verwijderschool($schoolId);

        return redirect('/admin/scholen');
        
    }

    public function openschoolAdmin($id, Request $request){

        $school = new scholen();
        $schoolId = $id;

        $campus = new Campussen();
        $alleCampussen = $campus->alleCampussenOpvragen($schoolId);

        $interessegebied = new Interessegebieden();
        $alleInteressegebieden= $interessegebied->alleInteressegebiedenOpvragen($schoolId);

        $geopendeSchool = $school->schoolOpvragenViaId($schoolId)->first();

        $media = new Media;
        $alleSchoolMedia = $media->schoolMediaOphalenViaSchoolId($schoolId);

        
        return view('/admin/scholen/openSchool', 
            ['geopendeSchool' => $geopendeSchool,
            'alleCampussen' => $alleCampussen,
            'alleInteressegebieden' => $alleInteressegebieden,
            'alleSchoolMedia' => $alleSchoolMedia,
            ]);
        
    }

    public function goedkeurenSchool($id){

        $school = new scholen();
        $scholenId = $id;
        $datumEnTijd = new DateTime();
        $goedkeuringsstatus = 'Goedgekeurd';
        $redenVanAfwijzing = null;
     
        $school->wijzigSchool($scholenId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'goedgekeurdop' => $datumEnTijd,
                'redenVanAfwijzing' => $redenVanAfwijzing
            ]);
        

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol goedgekeurd.');
        
    }
    
    public function afwijzenSchool($id, Request $request){

        $school = new scholen();
        $scholenId = $id;
        $goedkeuringsstatus = 'Afgewezen';
        $goedgekeurdop = null;

        $validated = Validator::make($request->all(), [
          'redenVanAfwijzing' => 'required',
        ]);

        if(!$validated->fails()){
            $school->wijzigSchool($scholenId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'redenVanAfwijzing' => $request->input('redenVanAfwijzing'),
                'goedgekeurdop' => $goedgekeurdop
            ]);

            $this->offlineHalenSchool($scholenId);
        };        

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'Het artikel werd succesvol afgewezen.');
        
    }

    public function publicerenschool($id){

        $school = new scholen();
        $scholenId = $id;
        $datumEnTijd = new DateTime();
        $publicatieStatus = 'Gepubliceerd';
     
        $school->wijzigSchool($scholenId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        $this->goedkeurenschool($scholenId);

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol gepubliceerd.');
        
    }

    public function offlineHalenSchool($id){

        $school = new scholen();
        $scholenId = $id;
        $datumEnTijd = null;
        $publicatieStatus = 'Nog niet gepubliceerd';
     
        $school->wijzigSchool($scholenId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol offline gehaald.');
        
    }

    public function openVoegCampusToe($id){
        $school = new scholen();
        $schoolId = $id;

        $geopendeSchool = $school->schoolOpvragenViaId($schoolId)->first();

        return view('admin/scholen/toevoegenCampus',[
            'geopendeSchool' => $geopendeSchool
            ]);
    }

     public function voegCampusToe($id, Request $request)
    {
        $campus = new Campussen();
        $school_id = $id;
    
        $validator = Validator::make($request->all(), [
            'campus' => 'required',
            'locatie-text' => 'required',
            'coordinaten' => 'required',
        ]);

        if($validator->passes()){
            $campus->voegCampusToe([
                'naam' => $request->input('campus'),
                'adres' => $request->input('locatie-text'),
                'coordinaten' => $request->input('coordinaten'),
                'school_id' => $school_id
            ]);

            return redirect('/admin/scholen/open/'.$school_id);
        } else {

            return Redirect::back()->withErrors($validator);
        }
         
        
    }

    public function verwijderCampus($id){
        
        $campus = new Campussen();
        $campusId = $id;    

        $campus->verwijderCampus($campusId);

        return redirect::back();
        
    }

    
    public function openVoegInteressegebiedToe($id){
        $school = new scholen();
        $schoolId = $id;

        $geopendeSchool = $school->schoolOpvragenViaId($schoolId)->first();

        return view('admin/scholen/toevoegenInteressegebied',[
            'geopendeSchool' => $geopendeSchool
            ]);
    }

    public function voegInteressegebiedToe($id, Request $request)
    {
        $interessegebied = new Interessegebieden();
        $school_id = $id;

        $media = new Media();
    
        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'link' => 'required',
            'afbeelding' => 'required',
        ]);

        if($validator->passes()){
            $interessegebiedId = $interessegebied->voegInteressegebiedToe([
                'naam' => $request->input('naam'),
                'link' => $request->input('link'),
                'school_id' => $school_id
            ]);

             
            $afbeelding = Input::file('afbeelding');
            if($afbeelding){

            $mediaType = "Afbeelding";
            $afbeeldingNaam = 'interessegebied-'.$interessegebiedId.'-'.str_random(5).$afbeelding->getClientOriginalName();
            $afbeelding->move('img/interessegebieden/', $afbeeldingNaam);
            $filePath = 'img/interessegebieden/'.$afbeeldingNaam;
                        
            //Afbeelding toevoegen in de database
            $media->voegMediaToe([
            'link' => $filePath,
            'mediaType' => $mediaType,
            'interessegebied_id' => $interessegebiedId
            ]);
            }

            return redirect('/admin/scholen/open/'.$school_id);
        } else {

            return Redirect::back()->withErrors($validator);
            
        }
         
        
    }

    public function verwijderInteressegebied($id){
        
        $interessegebied = new Interessegebieden();
        $interessegebiedId = $id;  

        $media = new Media();
        $interessegebiedMedia = $media->interesseMediaOphalenViaInteresseId($interessegebiedId);

        if(sizeof($interessegebiedMedia) >0){
            foreach ($interessegebiedMedia as $media) {
                if($media->mediaType == "Afbeelding"){
                    $filePath = $media->link;
                    unlink($filePath);
                }
            }   

            
        }
        
        $interessegebied->verwijderInteressegebied($interessegebiedId);

        return redirect::back();
    }

}
