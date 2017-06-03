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

class TagsController extends Controller
{
    public function index()
    {
        $tag = new Tags();
        $alleTags = $tag->alleTagsOpvragen();

        return view('admin/tags',
            ['alleTags' => $alleTags
            ]);
        
    }

    public function voegTagToe(Request $request)
    {
        $tag = new Tags();
    
        $validator = Validator::make($request->all(), [
            'tag' => 'required',
        ]);

        if($validator->passes()){
            $tag->voegTagToe([
                'naam' => $request->input('tag')
            ]);

            return Redirect::back();
        } else {

            return Redirect::back()->with('foutmelding', 'U moet een tagnaam invoeren.');
        }
         
        
    }

    public function verwijderTag($id){
        
        $tag = new Tags();
        $tagId = $id;    

        $tag->verwijderTag($tagId);

        return redirect('/admin/tags');
        
    }
        

    
    
}
