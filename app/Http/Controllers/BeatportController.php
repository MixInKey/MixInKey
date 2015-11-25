<?php

namespace App\Http\Controllers;

use App\Helpers\BeatportApi;

use App\Helpers\DataTransformer;
use Illuminate\Http\Request;
// use Request;

class BeatPortController extends Controller
{
    public function __construct()
    {
        $this->api = new BeatportApi();
    }

    /**
     * Return all genres from Beatport.
     *
     * @method GET
     *
     * @return Response Json
     */
    public function getAllGenres()
    {
        $query = DataTransformer::prepare(null, 'genres');
        $genres = $this->api->queryApi($query);

        return response()->json($genres);
    }

    /**
     * Find tracks by multi where clauses.
     *
     * @method GET
     *
     * @param  Request  $request Data from clientside (AngularJS)
     *
     * @return Response $tracks
     */
    public function findTracks(Request $request)
    {
        $query = DataTransformer::prepare($request->all(), 'tracks');
        $tracks = $this->api->queryApi($query);
        if ($request->get('page') > $tracks['metadata']['totalPages']) {
            $tracks = [];
        }

        return response()->json($tracks);
    }

    /**
     * Display search main view.
     *
     * @return resource rendered view
     */
    public function searchView()
    {
        return view('templates.search');
    }
}
