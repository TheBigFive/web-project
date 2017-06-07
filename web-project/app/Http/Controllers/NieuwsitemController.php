<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Nieuwsitems;
use App\Tags;
use App\Media;
use Auth;
use Validator;
use Redirect;
use DateTime;
use Input;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class NieuwsitemController extends Controller
{
    public function index()
    {
        $nieuwsitem = new Nieuwsitems();
        $alleNieuwsitems = $nieuwsitem->alleNieuwsitemsOpvragenVoorAdmin();

        return view('admin/nieuwsitems/nieuwsitems',
            ['alleNieuwsitems' => $alleNieuwsitems
            ]);
    }

    

    public function ophalenNieuwsitem()
    {
        $media = new Media();
        $nieuwsitem = new Nieuwsitems();
        $alleNieuwsitems = $nieuwsitem->alleNieuwsitemsOpvragen();

        return view('user/nieuwsberichten',
            ['alleNieuwsitems' => $alleNieuwsitems]);
    }

    public function openNieuwsartikel($id)
    {
        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemId = $id;
        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemId)->first();

        $media = new Media;
        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemId);


        return view('user/nieuwsartikel', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia,
            ]);    
    }

    public function ophalenNieuwsitemWelkom()
    {
        $media = new Media();
        $nieuwsitem = new Nieuwsitems();
        $alleNieuwsitems = $nieuwsitem->alleNieuwsitemsOpvragen();

        return view('welkom',
            ['alleNieuwsitems' => $alleNieuwsitems]);
    }
    
    public function openToevoegenNieuwsitem()
    {
        $tag = new Tags();
        $alleTags = $tag->alleTagsOpvragen();

        return view('admin/nieuwsitems/toevoegenNieuwsitem',
            ['alleTags' => $alleTags,
            ]);
        
    }

    public function voegNieuwsitemToe(Request $request)
    {
        $nieuwsitem = new Nieuwsitems();
        $gebruikersId = Auth::id();
        $publicatieStatus = 'Nog niet gepubliceerd';
        $goedkeuringsstatus = 'Nieuw artikel';
        $datumEnTijd = new DateTime();

        $media = new Media();

        $validator = Validator::make($request->all(), [
          'titel' => 'required',
          'introtekst' => 'required',
          'artikel' => 'required',
          'afbeeldingen' => 'required'
        ]);


        if($validator->passes()){
            $nieuwsitem_id = $nieuwsitem->voegNieuwsitemToe([
                'titel' => $request->input('titel'),
                'introtekst' => $request->input('introtekst'),
                'artikel' => $request->input('artikel'),
                'publicatieStatus' => $publicatieStatus,
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'toegevoegdop' => $datumEnTijd,
                'toegevoegddoor_id' => $gebruikersId,
                'tag_id' => $request->input('tag'),
            ]);

            //Toevoegen van afbeeldingen 
            if(Input::file('afbeeldingen')){
                $afbeeldingen = Input::file('afbeeldingen');
                foreach ($afbeeldingen as $key =>  $afbeelding) {
                    $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                    $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                    if($validator->passes()){  

                        $afbeeldingNaam = 'nieuwsitem-'.$nieuwsitem_id.'-'.str_random(5).$afbeelding->getClientOriginalName();
                        $afbeelding->move('img/nieuwsitems/', $afbeeldingNaam);
                        $filePath = 'img/nieuwsitems/'.$afbeeldingNaam;
                        $mediaType = "Afbeelding";

                        if($key == 0){
                            //Afbeelding toevoegen in de database met eerste afbeelding als hoofdafbeelding
                            $isHoofdafbeelding = true;
                            $media->voegMediaToe([
                            'link' => $filePath,
                            'mediaType' => $mediaType,
                            'nieuwsitem_id' => $nieuwsitem_id,
                            'isHoofdafbeelding' => $isHoofdafbeelding 
                            ]);

                        } else{
                            //Afbeelding toevoegen in de database
                            $media->voegMediaToe([
                            'link' => $filePath,
                            'mediaType' => $mediaType,
                            'nieuwsitem_id' => $nieuwsitem_id
                            ]);

                        }

                        
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
                'nieuwsitem_id' => $nieuwsitem_id
                ]);
            }

            return redirect('/admin/nieuwsitems/open/'.$nieuwsitem_id);
        }else{
            return Redirect::back()->withErrors($validator); 
        }       
    }

    public function verwijderMediaNieuwsitem($id){

        $mediaId = $id;
        $media = new Media();
        $opgehaaldeMedia = $media->nieuwsitemMediaOphalenViaId($mediaId)->first();
        if($opgehaaldeMedia->mediaType == "Afbeelding"){
            if($opgehaaldeMedia->isHoofdafbeelding){

                return Redirect::back()->with('hoofdafbeeldingmelding','Een hoofdafbeelding kan niet verwijderd worden. Stel eerst een ander afbeelding in als hoofdafbeelding.');
            }


            $filePath = $media->nieuwsitemMediaOphalenViaId($mediaId)->first()->link;
            $media->verwijderMedia($mediaId);
            unlink($filePath);
        }
        elseif ($opgehaaldeMedia->mediaType == "Video")
        {
            $media->verwijderMedia($mediaId);
        }

        return Redirect::back();
    }

    public function toevoegenMediaNieuwsitem($id, Request $request){

        $media = new Media();
        $nieuwsitemId = $id;


        if(Input::file('afbeeldingen')){
            $afbeeldingen = Input::file('afbeeldingen');
            foreach ($afbeeldingen as $afbeelding) {
                $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                if($validator->passes()){  
                    $mediaType = "Afbeelding";
                    $afbeeldingNaam = 'nieuwsitem-'.$nieuwsitemId.'-'.str_random(5).$afbeelding->getClientOriginalName();
                    $afbeelding->move('img/nieuwsitems/', $afbeeldingNaam);
                    $filePath = 'img/nieuwsitems/'.$afbeeldingNaam;
                        
                    //Afbeelding toevoegen in de database
                    $media->voegMediaToe([
                    'link' => $filePath,
                    'mediaType' => $mediaType,
                    'nieuwsitem_id' => $nieuwsitemId
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
            'nieuwsitem_id' => $nieuwsitemId
            ]);
        }

        return Redirect::back()->withErrors($validator);
    }

    public function stelHoofdafbeeldingIn($id){
        $media = new Media;
        $mediaId = $id;

        $inTeStellenMedia =  $media->nieuwsitemMediaOphalenViaId($mediaId)->first();
        $geopendeNieuwsitemId = $inTeStellenMedia->nieuwsitem_id;

        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($geopendeNieuwsitemId);

        //De afbeelding die ervoor hoofdafbeelding was, niet meer instellen als hoofdafbeelding
        foreach ($alleNieuwsitemMedia as $afbeelding) {
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

    public function openWijzigingNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $tag = new Tags();
        $media = new Media();
        $aantalAfbeeldingen = 0;
        $aantalVideos = 0;

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemsId)->first();
        $alleTags = $tag->alleTagsOpvragen();
        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemsId);

        foreach ($alleNieuwsitemMedia as $key => $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "Video"){
                $aantalVideos++;
            }
        }
        
        return view('/admin/nieuwsitems/wijzigNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleTags' => $alleTags,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'aantalVideos' => $aantalVideos
            ]);
        
    }

    public function wijzigNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $goedkeuringsstatus = "Werd gewijzigd";

        $validated = Validator::make($request->all(), [
          'titel' => 'required',
          'introtekst' => 'required',
          'artikel' => 'required',
        ]);

        if(!$validated->fails()){
            $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'titel' => $request->input('titel'),
                'introtekst' => $request->input('introtekst'),
                'artikel' => $request->input('artikel'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'tag_id' => $request->input('tag'),
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'Het artikel werd gewijzigd');
        
    }

    public function verwijderNieuwsitem($id){
        
        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemId = $id;

        //media dat in de folder wordt geplaatst moet ook verwijderd worden
        $media = new Media();
        $nieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemId);

        if(sizeof($nieuwsitemMedia) >0){
            foreach ($nieuwsitemMedia as $media) {
                if($media->mediaType == "Afbeelding"){
                    $filePath = $media->link;
                    unlink($filePath);
                }
            } 
        }
        $nieuwsitem->verwijderNieuwsitem($nieuwsitemId);

        return redirect('/admin/nieuwsitems');
        
    }

    public function openNieuwsitemAdmin($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemId = $id;
        $aantalAfbeeldingen = 0;
        $aantalVideos = 0;

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemId)->first();

        $media = new Media;
        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemId);

        foreach ($alleNieuwsitemMedia as $media) {
            if($media->mediaType == "Afbeelding"){
                $aantalAfbeeldingen++;
            }

            if($media->mediaType == "Video"){
                $aantalVideos++;
            }
        }
        
        return view('/admin/nieuwsitems/openNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'aantalVideos' => $aantalVideos
            ]);
        
    }

    public function goedkeurenNieuwsitem($id){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $datumEnTijd = new DateTime();
        $goedkeuringsstatus = 'Goedgekeurd';
        $redenVanAfwijzing = null;
     
        $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'goedgekeurdop' => $datumEnTijd,
                'redenVanAfwijzing' => $redenVanAfwijzing
            ]);
        

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol goedgekeurd.');
        
    }
    
    public function afwijzenNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $goedkeuringsstatus = 'Afgewezen';
        $goedgekeurdop = null;

        $validated = Validator::make($request->all(), [
          'redenVanAfwijzing' => 'required',
        ]);

        if(!$validated->fails()){
            $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'redenVanAfwijzing' => $request->input('redenVanAfwijzing'),
                'goedgekeurdop' => $goedgekeurdop
            ]); 
        };        

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'Het artikel werd succesvol afgewezen.');
        
    }

    public function publicerenNieuwsitem($id){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $datumEnTijd = new DateTime();
        $publicatieStatus = 'Gepubliceerd';
     
        $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        $this->goedkeurenNieuwsitem($nieuwsitemsId);

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol gepubliceerd.');
        
    }

    public function offlineHalenNieuwsitem($id){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $datumEnTijd = null;
        $publicatieStatus = 'Nog niet gepubliceerd';
     
        $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'gepubliceerdop' => $datumEnTijd,
                'publicatieStatus' => $publicatieStatus
            ]);

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol offline gehaald.');
        
    }
    
}
