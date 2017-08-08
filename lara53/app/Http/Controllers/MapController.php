<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mapper;



class MapController extends Controller
{
    public function location(){
    	 //Mapper::map(27.713179, 85.353681);
    	Mapper::map(27.713179, 85.353681, 
    	['zoom' => 15, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 
    	'clusters' => ['size' => 15, 'center' => true, 'zoom' => 35]]);
    	return view('pages.location');
    }
}
