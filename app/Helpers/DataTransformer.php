<?php

namespace Helpers;

class DataTransformer {

    /**
     * Prepare Request for Beatport API.
     * @param  mixed  $data      Query parameters to be serialize
     * @param  string $endpoint  Api endpoint to use
     * @return array  $query     Serialized Query parameters
     */
    public static function prepare($data = null, $endpoint = 'tracks')
    {
        $params = [];
        $query  = [
            'perPage' => isset($data['perPage']) ? $data['perPage'] : 150,
            'url'     => $endpoint,
            'facets'  => '',
        ];

        if (!is_null($data)) {
            if (isset($data['genre'])) {
                $params['genre'] = self::byGenre($data['genre']);
            }
        }

        if (count($params) > 0) {
            $query['facets'] = implode(',', $params);
        }

        return $query;
    }

    protected function byGenre($genre)
    {
        if (is_null($genre)) {
            return '';
        }

        $param = '';
        if (is_int($genre)) {
            $param = "genreId:{$genre}";
        } else {
            $param = "genreName:{$genre}";
        }

        return $param;
    }
}
