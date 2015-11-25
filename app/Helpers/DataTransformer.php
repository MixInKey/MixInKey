<?php

namespace App\Helpers;

class DataTransformer
{
    public function __construct()
    {
        $this->endpoint = 'tracks';
    }

    /**
     * Prepare Request for Beatport API.
     *
     * @param mixed  $data     Query parameters to be serialize
     * @param string $endpoint Api endpoint to use
     *
     * @return array $query     Serialized Query parameters
     */
    public static function prepare($data = null, $endpoint = 'tracks')
    {
        $params = [];
        $query  = [
            'page'    => isset($data['page']) ? $data['page'] : null,
            'perPage' => isset($data['perPage']) ? $data['perPage'] : 150,
            'url'     => $endpoint,
            'facets'  => '',
        ];

        if (!is_null($data)) {
            foreach ($data as $prop => $v) {
                $method = 'by'.ucfirst($prop);
                if (method_exists(__CLASS__, $method)) {
                    $params[$prop] = self::$method($data[$prop]);
                }
            }
        }

        if (count($params) > 0) {
            $query['facets'] = implode(',', $params);
        }

        return $query;
    }

    /**
     * Prepare 'genre' parameter for query.
     *
     * @param  int    $genre
     *
     * @return string $param
     */
    protected static function byGenre($genre)
    {
        if (is_null($genre)) {
            return '';
        }

        $param = '';
        if (intval($genre) > 0) {
            $param = "genreId:{$genre}";
        } else {
            $param = "genreName:{$genre}";
        }

        return $param;
    }

    protected static function byBpm($bpm)
    {
        if (is_null($bpm)) {
            return '';
        }

        $param = '';
        if (intval($bpm) > 0) {
            $param = "bpm:{$bpm}";
        } else {
            $param = "rangeName=bpm&rangeStart=128&rangeEnd=180";
        }

        return $param;
    }
}
