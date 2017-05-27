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
        $alleNieuwsitems = $nieuwsitem->alleNieuwsitemsOpvragen();

        return view('admin/nieuwsitems/nieuwsitems',
            ['alleNieuwsitems' => $alleNieuwsitems
            ]);
        
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

        $mediaCategorie = $request->input('mediaCategorie');
        $media = new Media();

        $validator = Validator::make($request->all(), [
          'titel' => 'required',
          'introtekst' => 'required',
          'artikel' => 'required',
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
                foreach ($afbeeldingen as $afbeelding) {
                    $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                    $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                    if($validator->passes()){  

                        $afbeeldingNaam = 'nieuwsitem-'.$nieuwsitem_id.'-'.str_random(5).$afbeelding->getClientOriginalName();
                        $afbeelding->move('img/nieuwsitems/', $afbeeldingNaam);
                        $filePath = 'img/nieuwsitems/'.$afbeeldingNaam;
                        
                        //Afbeelding toevoegen in de database
                        $media->voegMediaToe([
                        'link' => $filePath,
                        'mediaType' => $request->input('mediaType'),
                        'nieuwsitem_id' => $nieuwsitem_id
                        ]);
                    }
                }
            }

            return redirect('/admin/nieuwsitems/open/'.$nieuwsitem_id);
        }else{
            return Redirect::back()->withErrors($validator); 
        }       
    }

    public function verwijderMediaNieuwsitem($id){

        $mediaId = $id;
        $media = new Media();
        $filePath = $media->nieuwsitemMediaOphalenViaId($mediaId)->first()->link;
        $media->verwijderMedia($mediaId);
        unlink($filePath);

        return Redirect::back();
    }

    public function toevoegenMediaNieuwsitem($id, Request $request){

        $mediaCategorie = $request->input('mediaCategorie');
        $media = new Media();
        $nieuwsitemId = $id;

        if(Input::file('afbeeldingen')){
            $afbeeldingen = Input::file('afbeeldingen');
            foreach ($afbeeldingen as $afbeelding) {
                $regels = array('afbeelding' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                $validator = Validator::make(array('afbeelding'=> $afbeelding), $regels);
                    
                if($validator->passes()){  

                    $afbeeldingNaam = 'nieuwsitem-'.$nieuwsitemId.'-'.str_random(5).$afbeelding->getClientOriginalName();
                    $afbeelding->move('img/nieuwsitems/', $afbeeldingNaam);
                    $filePath = 'img/nieuwsitems/'.$afbeeldingNaam;
                        
                    //Afbeelding toevoegen in de database
                    $media->voegMediaToe([
                    'link' => $filePath,
                    'mediaType' => $request->input('mediaType'),
                    'nieuwsitem_id' => $nieuwsitemId
                    ]);
                }
            }
        }

        return Redirect::back()->withErrors($validator);
    }

    

    public function openWijzigingNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $tag = new Tags();
        $media = new Media();

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemsId)->first();
        $alleTags = $tag->alleTagsOpvragen();
        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemsId);
        
        return view('/admin/nieuwsitems/wijzigNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleTags' => $alleTags,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia
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

    public function verwijderNieuwsitem($id, Request $request){
        
        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemId = $id;    
        $nieuwsitem->verwijderNieuwsitem($nieuwsitemId);

        return redirect('/admin/nieuwsitems');
        
    }

    public function openNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemId = $id;

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemId)->first();

        $media = new Media;
        $alleNieuwsitemMedia = $media->nieuwsitemMediaOphalenViaNieuwsitemId($nieuwsitemId);
        
        return view('/admin/nieuwsitems/openNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia
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
