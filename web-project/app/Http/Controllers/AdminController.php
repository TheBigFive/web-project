<?php

namespace App\Http\Controllers;

use App\Gebruikers;
use App\Rollen;
use App\Media;
use Validator;
use Redirect;
use push;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session;
use App\Http\Requests;
use Input;



class AdminController extends Controller
{

    public function index(Request $request)
    {
        return view('admin/dashboard');
    }

    public function gebruikersPaginaOpenen(){
        $gebruikers = new Gebruikers();

        //Voor de tab alle gebruikers
        $alleGebruikers = $gebruikers->alleGebruikersOpvragen();
        $aantalGebruikers = sizeof($alleGebruikers);

        //Voor de tab administrators
        $adminGebruikers = array();
        $rolNaamAdministrator = 'Administrator';

        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_naam==$rolNaamAdministrator){
                array_push($adminGebruikers,$gebruiker);
            }
        }
        $aantalAdminGebruikers = sizeof($adminGebruikers);

        //Voor de tab approvers
        $approvers = array();
        $rolNaamApprover = 'Approver';

        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_naam == $rolNaamApprover){
                array_push($approvers,$gebruiker);
            }
        }
        $aantalApprovers = sizeof($approvers);

        //Voor de tab editors
        $editors = array();
        $rolNaamEditor = 'Editor';

        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_naam==$rolNaamEditor){
                array_push($editors,$gebruiker);
            }
        }
        $aantalEditors = sizeof($editors);

        return view('admin/gebruikers',
            ['alleGebruikers' => $alleGebruikers,
            'aantalGebruikers' => $aantalGebruikers,
            'adminGebruikers' => $adminGebruikers,
            'aantalAdminGebruikers' => $aantalAdminGebruikers,
            'approvers' => $approvers,
            'aantalApprovers' => $aantalApprovers,
            'editors' => $editors,
            'aantalEditors' => $aantalEditors,
            ]);
    }

    public function verwijderGebruiker($id, Request $request){
        
        $gebruiker = new Gebruikers();
        $gebruikerId = $id;    
        $gebruiker->verwijderGebruiker($gebruikerId);

        return redirect('/admin/gebruikers');
        
    }

    public function openGebruiker($id, Request $request){

        $gebruiker = new Gebruikers();
        $gebruikerId = $id;
        $geopendeGebruiker = $gebruiker->gebruikerViaIdOpvragen($gebruikerId)->first();

        $rollen = new Rollen();
        $alleRollen = $rollen->alleRollenOpvragen();

        
        return view('/admin/gebruikers/wijzigGebruiker', 
            ['geopendeGebruiker' => $geopendeGebruiker,
            'alleRollen' => $alleRollen
            ]);
        
    }

    public function wijzigGebruiker($id, Request $request){

        $gebruiker = new Gebruikers();
        $gebruikersId = $id;

        $validated = Validator::make($request->all(), [
          'voornaam' => 'required',
          'achternaam' => 'required',
          'email' => 'required',
          'geboortedatum' => 'required',
        ]);

        if(!$validated->fails()){
            $gebruiker->wijzigGebruiker($gebruikersId,[
                'voornaam' => $request->input('voornaam'),
                'achternaam' => $request->input('achternaam'),
                'email' => $request->input('email'),
                'rol_id' => $request->input('rol'),
                'geboortedatum' => $request->input('geboortedatum'),
                'woonplaats' => $request->input('woonplaats'),
                'geslacht' => $request->input('geslacht'),
                'op_kot' => $request->input('op_kot'),
                'studentenclub' => $request->input('studentenclub')
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De gegevens van de gebruiker werd gewijzigd');
        
    }

    public function zoekGebruikerViaNaam(Request $request){
        
        $validated = Validator::make($request->all(), [
          'teZoekenGebruiker' => 'required|min:2'
        ]);

        $gebruiker = new Gebruikers;
        
        $gebruikersNaam = $request->input('teZoekenGebruiker');
        if(!$validated->fails()){
            $zoekResultaten = $gebruiker->zoekGebruikerViaNaam($gebruikersNaam);
            $aantalZoekResultaten = sizeof($zoekResultaten);
            session()->put(['zoekResultaten' => $zoekResultaten,
            'aantalZoekResultaten' => $aantalZoekResultaten
            ]);

            return redirect('/admin/gebruikers')->withErrors($validated); 
        }
        else{
            return Redirect::back()->withErrors($validated); 
        }
        

        

        

    }
            

}
