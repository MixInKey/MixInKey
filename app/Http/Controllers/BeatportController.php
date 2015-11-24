<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\HelperServiceProvider;

class BeatPortController extends Controller
{

    public function call()
    {
        return view('api.call');
        /*
        Key Values:
          Amin=6, Amaj=23,
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
          G#min=32 , G#maj=31 ,
        */
    }

    public function search()
    {
      return view('templates.search');
    }

    public function getAllGenres()
    {
        $parameters = array(
            'consumer' => CONSUMERAPI,
            'secret' => SECRET,
            'login' => LOGIN,
            'password' => PASSWORD
        );

        $query = array(
            'facets' => '',
            'url' => 'genres',
            'perPage' => '1000',
        );

        $api = new \BeatportApi($parameters);
        $response = $api->queryApi($query);

        return response()->json($response);
    }

    public function findByGenre($genre)
    {
        $parameters = array(
            'consumer' => CONSUMERAPI,
            'secret' => SECRET,
            'login' => LOGIN,
            'password' => PASSWORD
        );

        $query = array(
            'facets' => 'genreName:'.$genre,
            'url' => 'genres',
            'perPage' => '1000',
        );

        $api = new \BeatportApi($parameters);
        $response = $api->queryApi($query);

        return response()->json($response);
    }

    public function byGenre($genre)
    {
        $query = [
            'facets' => 'genreId:'.$genre,
            'url'    => 'tracks',
            'perPage' => '1000',
        ];

        return $query;
    }

    public function findTracks($request, $param)
    {
        $parameters = array(
            'consumer' => CONSUMERAPI,
            'secret' => SECRET,
            'login' => LOGIN,
            'password' => PASSWORD
        );
        if ($request == 'genre') {
            $query = self::byGenre($param);
        }

        $api = new \BeatportApi($parameters);
        $response = $api->queryApi($query);

        return response()->json($response);
    }

}
