<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\HelperServiceProvider;
use Config;
use Helpers\BeatportApi;
use Helpers\DataFormater;

class BeatPortController extends Controller
{
    public function __construct()
    {
        $this->api = new BeatportApi();
    }

    /**
     * Return all genres from Beatport
     * @return Response Json
     */
    public function getAllGenres()
    {
        $query = DataFormater::prepare(null, 'genres');
        $response = $this->api->queryApi($query);

        return response()->json($response);
    }

    public function findTracks(Request $request)
    {
        $query = DataFormater::prepare($request->all());
        $response = $this->api->queryApi($query);

        return response()->json($response);
    }

    /**
     * Display search main view
     * @return resource rendered view
     */
    public function searchView()
    {
      return view('templates.search');
    }

}
