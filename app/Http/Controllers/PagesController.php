<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getLandingPage(){
        //$url = "https://api.weather.com/v3/wx/forecast/daily/5day?geocode=14.156233%2C121.262197&units=m&language=en-US&format=json&apiKey=f4664437a9f14d5ba64437a9f13d5b5a";

        //$json = json_decode(file_get_contents($url));
        
        //dd($json);
    
        return view('pages.index');
    }
}
