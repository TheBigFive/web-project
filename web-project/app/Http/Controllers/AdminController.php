<?php

namespace App\Http\Controllers;

use App\Gebruikers;
use App\Rollen;
use Validator;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index(Request $request)
    {
        return view('admin/dashboard');
    }

    public function gebruikersPaginaOpenen(){
        $gebruikers = new Gebruikers();
        $rollen = new Rollen();

        //Voor de tab alle gebruikers
        $alleGebruikers = $gebruikers->alleGebruikersOpvragen();
        $rollenVanAlleGebruikers = array();

        foreach ($alleGebruikers as $gebruiker) {
            $rolVanGebruiker = $rollen->RolOpvragenViaId($gebruiker->rol_id);
            array_push($rollenVanAlleGebruikers,$rolVanGebruiker);
        }
        $aantalGebruikers = sizeof($alleGebruikers);

        //Voor de tab administrators
        $adminGebruikers = array();

        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_id==1){
                array_push($adminGebruikers,$gebruiker);
            }
        }
        $aantalAdminGebruikers = sizeof($adminGebruikers);

        //Voor de tab approvers
        $approvers = array();
        $rollenVanAdminGebruikers = array();

        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_id==3){
                array_push($approvers,$gebruiker);
            }
        }
        $aantalApprovers = sizeof($approvers);

        //Voor de tab editors
        $editors = array();
        foreach ($alleGebruikers as $gebruiker) {
            if ($gebruiker->rol_id==4){
                array_push($editors,$gebruiker);
            }
        }
        $aantalEditors = sizeof($editors);

        return view('admin/gebruikers',
            ['alleGebruikers' => $alleGebruikers,
            'rollenVanAlleGebruikers' => $rollenVanAlleGebruikers,
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
        
        return redirect('/admin/gebruikers');
        
    }
    

    
   /* public function searchUser(Request $request){
        
        $validated = Validator::make($request->all(), [
          'gebruiker' => 'required|min:2'
        ]);

        
        $zoekResultaten = array();
        $zoekResultatenObjecten = new \stdClass();
       
            
        $gebruiker = new Gebruiker;
        
        $gebruikersNaam = $request->input('gebruiker');
        if(!$validated->fails()){
            $zoekResultatenObjecten = $gebruiker->getByName($gebruikersNaam);

            foreach($zoekResultatenObjecten as $object)
            {
                $zoekResultaten[] = (array) $object;
            }
            
            
            var_dump($zoekResultaten);
            var_dump($zoekResultatenObjecten);
        }
        
        
        return view('admin/index', [
            'title' => 'home',
            'zoekResultaten' => $zoekResultaten
          ])->withErrors($validated);
        
       
    }
    
    
    
    public function toggleAdminRights($id){
        $gebruiker = new Gebruiker();
        $userId = $id;
        
        if( $gebruiker->isAdmin($id)){
            $gebruiker->updateGebruiker($userId,[
                'isAdmin' => 0
            ]);
        }
        else
        {
            $gebruiker->updateGebruiker($userId,[
                'isAdmin' => 1
            ]);
        }
        
        return redirect('/admin');
    }*/
        

}
