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

class SpelController extends Controller
{
    public function index()
    {
        return view('user/spel');
    }
    
}
