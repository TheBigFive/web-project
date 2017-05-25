<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruikers;
use App\Nieuwsitems;
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

    public function ophalenNieuwsitem()
    {
        $nieuwsitem = new Nieuwsitems();
        $alleNieuwsitems = $nieuwsitem->alleNieuwsitemsOpvragen();

        return view('user/nieuwsberichten',
            ['alleNieuwsitems' => $alleNieuwsitems
            ]);
    }

    public function ophalenTestimonial()
    {
        $testimonial = new Testimonials();
        $alleTestimonials = $testimonial->alleTestimonialsOpvragen();

        return view('user/nieuwsberichten',['alleTestimonials' => $alleTestimonials]);
    }
}
