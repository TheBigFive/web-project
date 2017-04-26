<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
    	$campussen = DB::table('campussen')->get();
        //return $campussen;

    function build_table($array){
    // start table
	    $html = '<table>';
	    // header row
	    $html .= '<tr>';
	    foreach($array[0] as $key=>$value){
	            $html .= '<th>' . htmlspecialchars($key) . '</th>';
	        }
	        
	    $html .= '</tr>';

	    // data rows
	    foreach( $array as $key=>$value){
	        $html .= '<tr>';
	        foreach($value as $key2=>$value2){
	            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
	        }
	        $html .= '</tr>';
	    }

	    // finish table and return it

	    $html .= '</table>';
	    return $html;
}
        echo build_table($campussen);

    }
}