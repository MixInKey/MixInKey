<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Providers\HelperServiceProvider;

class BeatPortController extends Controller
{

    public function call()
    {
        //test
        error_reporting(E_ALL); // debug
        ini_set('display_errors', '1'); //debug
        // include'vendor/autoload.php';
        // include "BeatportApi.php"; // include the class
        // include "Beatportconfig.php";
        $parameters = array(
            'consumer' => CONSUMERAPI,
            'secret' => SECRET,
            'login' => LOGIN,
            'password' => PASSWORD
        );

        /*Key Values: Amin=6, Amaj=23,
        			A#min=26 , A#maj=25 ,
        			Bmin=10, Bmaj=13 ,
        			Cmin=5 , Cmaj=20 ,
        			C#min=28, C#maj=27 ,
        			Dmin=7 , Dmaj=22 ,
        			D#min=30 , D#maj=29 ,
        			Emin=9 , Emaj=24,
        			Fmin=4, Fmaj=19 ,
        			F#min=11 , F#maj=14 ,
        		 	Gmin=6 , Gmaj= 21,
        		 	G#min=32 , G#maj=31 ,*/
        $query = array(
            'facets' => 'artistId:405818,genreName:Electro House,key:4',
            'url' => 'tracks',
            'perPage' => '150'
        );

        $api = new \BeatportApi($parameters);
        $response = $api->queryApi($query);

        return view('api.call')->with('response', $response);
    }
}
