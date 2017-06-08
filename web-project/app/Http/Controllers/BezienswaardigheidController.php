<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Bezienswaardigheden;
use App\Media;
use Auth;
use Validator;
use Redirect;
use DateTime;
use Input;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class BezienswaardigheidController extends Controller
{
    public function index()
    {   
        $bezienswaardigheid = new Bezienswaardigheden();
        $alleBezienswaardigheden = $bezienswaardigheid->alleBezienswaardighedenOpvragen();
        $aantalNieuweEnGewijzigdeBezienswaardigheden = 0;

        foreach($alleBezienswaardigheden as $bezienswaardigheid){
            if($bezienswaardigheid->goedkeuringsstatus == "Nieuwe bezienswaardigheid" || $bezienswaardigheid->goedkeuringsstatus == "Gewijzigd"){
                $aantalNieuweEnGewijzigdeBezienswaardigheden++;
            }
        }

        return view('admin/bezienswaardigheden/bezienswaardigheden',
            ['alleBezienswaardigheden' => $alleBezienswaardigheden,
            'aantalNieuweEnGewijzigdeBezienswaardigheden' => $aantalNieuweEnGewijzigdeBezienswaardigheden
            ]);       
    }

        public function ophalenBezienswaardigheden()
    {   
        $media = new Media();
        $bezienswaardigheid = new Bezienswaardigheden();
        $alleBezienswaardigheden = $bezienswaardigheid->GoedgekeurdeBezienswaardighedenOpvragen();
        return view('user/bezienswaardigheden',
            ['alleBezienswaardigheden' => $alleBezienswaardigheden
            ]);        
    }

    public function open360($id){
        $afbeelding360Id = $id;
        $media = new Media;
        $geopende360Afbeelding = $media->bezienswaardigheidMediaOphalenViaId($afbeelding360Id)->first();

        return view('user/open360',
            ['geopende360Afbeelding' => $geopende360Afbeelding
            ]);
    }

    public function openBezienswaardigheidAdmin($id, Request $request){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $aantalAfbeeldingen = 0;
        $erIsEen360Afbeelding = False;

        $geopendeBezienswaardigheid = $bezienswaardigheid->bezienswaardigheidOpvragenViaId($bezienswaardigheidId)->first();

        $media = new Media;
        $alleBezienswaardigheidMedia = $media->bezienswaardigheidMediaOphalenViaBezienswaardigheidId($bezienswaardigheidId);

        foreach ($alleBezienswaardigheidMedia as $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "360"){
                $erIsEen360Afbeelding = True;
            }
        }
        
        return view('/admin/bezienswaardigheden/openBezienswaardigheid', 
            ['geopendeBezienswaardigheid' => $geopendeBezienswaardigheid,
            'alleBezienswaardigheidMedia' => $alleBezienswaardigheidMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'erIsEen360Afbeelding' => $erIsEen360Afbeelding
            ]);
    }

        public function openBezienswaardigheidUser($id){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $aantalAfbeeldingen = 0;
        $erIsEen360Afbeelding = False;

        $geopendeBezienswaardigheid = $bezienswaardigheid->bezienswaardigheidOpvragenViaId($bezienswaardigheidId)->first();

        $media = new Media;
        $alleBezienswaardigheidMedia = $media->bezienswaardigheidMediaOphalenViaBezienswaardigheidId($bezienswaardigheidId);

        foreach ($alleBezienswaardigheidMedia as $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "360"){
                $erIsEen360Afbeelding = True;
            }
        }
        
        return view('/user/bezienswaardigheid', 
            ['geopendeBezienswaardigheid' => $geopendeBezienswaardigheid,
            'alleBezienswaardigheidMedia' => $alleBezienswaardigheidMedia]);
    }

    public function openToevoegenBezienswaardigheid()
    {
        return view('admin/bezienswaardigheden/toevoegenBezienswaardigheid');
        
    }

    public function voegBezienswaardigheidToe(Request $request)
    {
        $bezienswaardigheid = new Bezienswaardigheden();
        $gebruikersId = Auth::id();
        $publicatieStatus = 'Nog niet gepubliceerd';
        $goedkeuringsstatus = 'Nieuwe bezienswaardigheid';
        $datumEnTijd = new DateTime();

        $validator = Validator::make($request->all(), [
          'naam' => 'required',
          'beschrijving' => 'required',
          'locatie-text' => 'required'

        ]);

        if($validator->passes()){
            $bezienswaardigheid_id = $bezienswaardigheid->voegBezienswaardigheidToe([
                'naam' => $request->input('naam'),
                'beschrijving' => $request->input('beschrijving'),
                'openingsuren' => $request->input('openingsuren'),
                'vervoer' => $request->input('vervoer'),
                'kostprijs' => $request->input('kostprijs'),
                'adres' => $request->input('locatie-text'),
                'coordinaten' => $request->input('coordinaten'),
                'contact' => $request->input('contact'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'publicatieStatus' => $publicatieStatus,
                'toegevoegddoor_id' => $gebruikersId,
                'toegevoegdop' => $datumEnTijd
            ]);

            $afbeeldingen = Input::file('afbeeldingen');
            $afbeelding360 = Input::file('afbeelding360');

            if($afbeeldingen){

                $validator = $this->afbeeldingToevoegen($bezienswaardigheid_id, $afbeeldingen);
            }

            if($afbeelding360){
                $validator = $this->afbeelding360Toevoegen($bezienswaardigheid_id, $afbeelding360);
            }

             return redirect('/admin/bezienswaardigheden/open/'.$bezienswaardigheid_id)->withErrors($validator);

        } else{
            return Redirect::back()->withErrors($validator);
        }

       

    }

    public function openWijzigingBezienswaardigheid($id){
        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $media = new Media();
        $aantalAfbeeldingen = 0;
        $erIsEen360Afbeelding = False;

        $geopendeBezienswaardigheid = $bezienswaardigheid->bezienswaardigheidOpvragenViaId($bezienswaardigheidId)->first();
        $alleBezienswaardigheidMedia = $media->bezienswaardigheidMediaOphalenViabezienswaardigheidId($bezienswaardigheidId);

        foreach ($alleBezienswaardigheidMedia as $key => $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "360"){
                $erIsEen360Afbeelding = True;
            }
        }
        
        return view('/admin/bezienswaardigheden/wijzigBezienswaardigheid', 
            ['geopendeBezienswaardigheid' => $geopendeBezienswaardigheid,
            'alleBezienswaardigheidMedia' => $alleBezienswaardigheidMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'erIsEen360Afbeelding' => $erIsEen360Afbeelding,
            ]);
    }

    

    public function wijzigBezienswaardigheid($id, Request $request){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $goedkeuringsstatus = "Werd gewijzigd";

        $validated = Validator::make($request->all(), [
          'naam' => 'required',
          'beschrijving' => 'required',
        ]);

        if($validated->passes()){
            $bezienswaardigheid->wijzigBezienswaardigheid($bezienswaardigheidId,[
                'naam' => $request->input('naam'),
                'beschrijving' => $request->input('beschrijving'),
                'openingsuren' => $request->input('openingsuren'),
                'vervoer' => $request->input('vervoer'),
                'kostprijs' => $request->input('kostprijs'),
                'adres' => $request->input('adres'),
                'contact' => $request->input('contact'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De bezienswaardigheid werd gewijzigd');
        
    }

    public function verwijderBezienswaardigheid($id){
        
        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;

        //media dat in de folder wordt geplaatst moet ook verwijderd worden
        $media = new Media();
        $bezienswaardigheidMedia = $media->bezienswaardigheidMediaOphalenViabezienswaardigheidId($bezienswaardigheidId);

        if(sizeof($bezienswaardigheidMedia) >0){
            foreach ($bezienswaardigheidMedia as $media) {
                if($media->mediaType == "Afbeelding" || $media->mediaType == "360" ){
                    $filePath = $media->link;
                    unlink($filePath);
                }
            } 
        }
        $bezienswaardigheid->verwijderbezienswaardigheid($bezienswaardigheidId);

        return redirect('/admin/bezienswaardigheden');
        
    }

    public function goedkeurenBezienswaardigheid($id){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $datumEnTijd = new DateTime();
        $goedkeuringsstatus = 'Goedgekeurd';
        $redenVanAfwijzing = null;
     
        $bezienswaardigheid->wijzigBezienswaardigheid($bezienswaardigheidId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'goedgekeurdop' => $datumEnTijd,
                'redenVanAfwijzing' => $redenVanAfwijzing
            ]);
        

        return Redirect::back()->with('succesBericht', 'De bezienswaardigheid werd succsvol goedgekeurd.');
        
    }

    public function afwijzenBezienswaardigheid($id, Request $request){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $goedkeuringsstatus = 'Afgewezen';
        $goedgekeurdop = null;

        $validator = Validator::make($request->all(), [
          'redenVanAfwijzing' => 'required',
        ]);

        if($validator->passes()){
            $bezienswaardigheid->wijzigBezienswaardigheid($bezienswaardigheidId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'redenVanAfwijzing' => $request->input('redenVanAfwijzing'),
                'goedgekeurdop' => $goedgekeurdop
            ]);

            $this->offlineHalenBezienswaardigheid($bezienswaardigheidId);
        };        

        return Redirect::back()->withErrors($validator)->with('succesBericht', 'De bezienswaardigheid werd succesvol afgewezen.');
        
    }

    public function publicerenBezienswaardigheid($id){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $datumEnTijd = new DateTime();
        $publicatieStatus = 'Gepubliceerd';
     
        $bezienswaardigheid->wijzigBezienswaardigheid($bezienswaardigheidId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        $this->goedkeurenBezienswaardigheid($bezienswaardigheidId);

        return Redirect::back()->with('succesBericht', 'De bezienswaardigheid werd succsvol gepubliceerd.');
        
    }

    public function offlineHalenBezienswaardigheid($id){

        $bezienswaardigheid = new Bezienswaardigheden();
        $bezienswaardigheidId = $id;
        $datumEnTijd = null;
        $publicatieStatus = 'Nog niet gepubliceerd';
     
        $bezienswaardigheid->wijzigBezienswaardigheid($bezienswaardigheidId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        return Redirect::back()->with('succesBericht', 'De bezienswaardigheid werd succesvol offline gehaald.');
        
    }

    public function toevoegenMediaBezienswaardigheid($id,Request $request){
        $media = new Media();
        $bezienswaardigheid_id = $id;

        $afbeeldingen = Input::file('afbeeldingen');
        $afbeelding360 = Input::file('afbeelding360');

            if($afbeeldingen){

                $validator = $this->afbeeldingToevoegen($bezienswaardigheid_id, $afbeeldingen);
            }

            if($afbeelding360){
                $validator = $this->afbeelding360Toevoegen($bezienswaardigheid_id, $afbeelding360);
            }

        return redirect('/admin/bezienswaardigheden/wijzig/'.$bezienswaardigheid_id)->withErrors($validator)->with('succesBericht', 'De afbeelding werd succesvol toegevoegd.');
    }

    public function afbeeldingToevoegen($bezienswaardigheid_id, $afbeeldingen){

        $media = new Media();

        foreach ($afbeeldingen as $key => $afbeelding) {
            $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
            $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
            if($validator->passes()){  
                $mediaType = "Afbeelding";
                $afbeeldingNaam = 'bezienswaardigheid-'.$bezienswaardigheid_id.'-'.str_random(5).$afbeelding->getClientOriginalName();
                $afbeelding->move('img/bezienswaardigheden/', $afbeeldingNaam);
                $filePath = 'img/bezienswaardigheden/'.$afbeeldingNaam;

                if(sizeOf($media->bezienswaardigheidMediaOphalenViabezienswaardigheidId($bezienswaardigheid_id))<1){
                    if($key == 0){
                        $isHoofdafbeelding = true;
                        //Afbeelding toevoegen in de database
                        $media->voegMediaToe([
                        'link' => $filePath,
                        'mediaType' => $mediaType,
                        'bezienswaardigheid_id' => $bezienswaardigheid_id,
                        'isHoofdafbeelding' => $isHoofdafbeelding
                        ]);
                    }
                } else{
                    $media->voegMediaToe([
                        'link' => $filePath,
                        'mediaType' => $mediaType,
                        'bezienswaardigheid_id' => $bezienswaardigheid_id
                        ]);

                }

                        
                



            } else{
                return "het passeert ni";
            }
        }

        return $validator;

    }

    public function afbeelding360Toevoegen($bezienswaardigheid_id, $afbeelding360){

        $media = new Media();

        $regels = array('afbeelding360' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
        $validator = Validator::make(array('afbeelding360'=> $afbeelding360), $regels);
             
        if($validator->passes()){  
            $mediaType = "360";
            $afbeeldingNaam = 'bezienswaardigheid-'.$bezienswaardigheid_id.'-'.str_random(5).$afbeelding360->getClientOriginalName();
            $afbeelding360->move('img/bezienswaardigheden/', $afbeeldingNaam);
            $filePath = 'img/bezienswaardigheden/'.$afbeeldingNaam;
                        
            //Afbeelding toevoegen in de database
            $media->voegMediaToe([
                'link' => $filePath,
                'mediaType' => $mediaType,
                'bezienswaardigheid_id' => $bezienswaardigheid_id
            ]);
        
        }

        return $validator;

    }

    public function afbeeldingVerwijderen($id){

        $mediaId = $id;
        $media = new Media();
        $opgehaaldeMedia = $media->bezienswaardigheidMediaOphalenViaId($mediaId)->first();

        if($opgehaaldeMedia->mediaType == "Afbeelding" || $opgehaaldeMedia->mediaType == "360"){
            $filePath = $media->bezienswaardigheidMediaOphalenViaId($mediaId)->first()->link;
            $media->verwijderMedia($mediaId);
            unlink($filePath);
        }

        return Redirect::back()->with('succesBericht', 'De afbeelding werd verwijderd.');
    }
    
    public function stelHoofdafbeeldingIn($id){
        $media = new Media;
        $mediaId = $id;

        $inTeStellenMedia =  $media->bezienswaardigheidMediaOphalenViaId($mediaId)->first();
        $geopendeBezienswaardigheidId = $inTeStellenMedia->bezienswaardigheid_id;

        $alleBezienswaardigheidMedia = $media->bezienswaardigheidMediaOphalenViabezienswaardigheidId($geopendeBezienswaardigheidId);

        //De afbeelding die ervoor hoofdafbeelding was, niet meer instellen als hoofdafbeelding
        foreach ($alleBezienswaardigheidMedia as $afbeelding) {
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
