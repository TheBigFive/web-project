<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Nieuwsitems;
use Auth;
use Validator;
use Redirect;
use DateTime;

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
        return view('admin/nieuwsitems/toevoegenNieuwsitem');
        
    }

    public function voegNieuwsitemToe(Request $request)
    {
        $nieuwsitem = new Nieuwsitems();
        $gebruikersId = Auth::id();
        $goedkeuringsstatus = 'Nieuw artikel';
        $datumEnTijd = new DateTime();

        $validated = Validator::make($request->all(), [
          'titel' => 'required',
          'introtekst' => 'required',
          'artikel' => 'required',
        ]);

        if(!$validated->fails()){
            $nieuwsitem->voegNieuwsitemToe([
                'titel' => $request->input('titel'),
                'introtekst' => $request->input('introtekst'),
                'artikel' => $request->input('artikel'),
                'goedkeuringsstatus' => $goedkeuringsstatus,
                'toegevoegdop' => $datumEnTijd,
                'toegevoegddoor_id' => $gebruikersId,
            ]);
        }

        return redirect('/admin/nieuwsitems/')->withErrors($validated); 
        
    }

    public function openWijzigingNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemsId)->first();
        
        return view('/admin/nieuwsitems/wijzigNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            ]);
        
    }

    public function wijzigNieuwsitem($id, Request $request){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;

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
        $nieuwsitemsId = $id;

        $geopendeNieuwsitem = $nieuwsitem->nieuwsitemOpvragenViaId($nieuwsitemsId)->first();
        
        return view('/admin/nieuwsitems/openNieuwsitem', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            ]);
        
    }

    public function goedkeurenNieuwsitem($id){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $goedkeuringsstatus = 'Goedgekeurd';
     
        $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus
            ]);
        

        return Redirect::back()->with('succesBericht', 'Het artikel werd succsvol goedgekeurd.');
        
    }
    
    public function afwijzenNieuwsitem($id){

        $nieuwsitem = new Nieuwsitems();
        $nieuwsitemsId = $id;
        $goedkeuringsstatus = 'Afgewezen';
     
        $nieuwsitem->wijzigNieuwsitem($nieuwsitemsId,[
                'goedkeuringsstatus' => $goedkeuringsstatus
            ]);
        

        return Redirect::back()->with('succesBericht', 'Het artikel werd succesvol afgewezen.');
        
    }
    
}
