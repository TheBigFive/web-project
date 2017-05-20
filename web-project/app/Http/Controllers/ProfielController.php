<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use Auth;
use Validator;
use Redirect;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class ProfielController extends Controller
{
    public function index()
    {
        if(Auth::guest()){
            return view('welkom');
        } 
        else
        {
            return view('auth/profiel');
        }
    }
    
    public function wijzigen(Request $request)
    {
        $gebruiker = new Gebruikers();
        $gebruikersId = Auth::id();

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
                'geboortedatum' => $request->input('geboortedatum'),
                'woonplaats' => $request->input('woonplaats'),
                'geslacht' => $request->input('geslacht'),
                'op_kot' => $request->input('op_kot'),
                'studentenclub' => $request->input('studentenclub')
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesBericht', 'De gegevens van de gebruiker werd gewijzigd');

        
        
        
    }

    public function wachtwoordWijzigen(Request $request)
    {
        $gebruiker = new Gebruikers();
        $gebruikersId = Auth::id();

        $validated = Validator::make($request->all(), [
          'password' => 'required|min:6',
          'password_confirmation' => 'required|min:6|same:password',
        ]);

        if(!$validated->fails()){
            $gebruiker->wijzigGebruiker($gebruikersId,[
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return Redirect::back()->withErrors($validated)->with('succesWachtwoordBericht', 'Je wachtwoord werd succesvol gewijzigd.');
    }
    
    public function verwijderen()
    {
        $gebruiker = new Gebruikers();
        $gebruikersId = Auth::id();    
        $gebruiker->verwijderGebruiker($gebruikersId);

        return redirect('/');
    }
}
