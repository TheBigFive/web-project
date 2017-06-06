<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('user/nieuwsartikel');
    }
    
    public function openNieuwsitem($id){

       
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

        return view('user/nieuwsartikels', 
            ['geopendeNieuwsitem' => $geopendeNieuwsitem,
            'alleNieuwsitemMedia' => $alleNieuwsitemMedia,
            'aantalAfbeeldingen' => $aantalAfbeeldingen,
            'aantalVideos' => $aantalVideos]);
    }

}
