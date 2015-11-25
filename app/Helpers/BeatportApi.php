<?php

namespace App\Helpers;

use Config;

class BeatportApi
{
    private $oauth;

    public function __construct()
    {
        $this->params = array(
            'consumerKey'      => Config::get('beatport.consumer'),
            'consumerSecret'   => Config::get('beatport.secret'),
            'beatportLogin'    => Config::get('beatport.login'),
            'beatportPassword' => Config::get('beatport.password'),
        );
        $this->oauth = $this->oAuthDance();
    }

    private function buildQuery($parameters)
    {
        $facets  = $parameters['facets'];
        $perPage = $parameters['perPage'];
        $url     = $parameters['url'];
        $qryarray = array();
        $qrystring = '';
        if (isset($facets)) {
            $qrystring .= '?facets='.urlencode($facets);
            $qryarray['facets'] = $facets;
        } elseif (isset($id) && strlen($id) > 0) {
            $qrystring .= '?id='.urlencode($id);
            $qryarray['id'] = $id;
        } else {
            throw new Exception('Parameter missing');
        }
        if (isset($sortBy) && strlen($sortBy) > 0) {
            $qrystring .= '&sortBy='.urlencode($sortBy);
            $qryarray['sortBy'] = $sortBy;
        }
        if (isset($perPage) && strlen($perPage) > 0) {
            $qrystring .= '&perPage='.urlencode($perPage);
            $qryarray['perPage'] = $perPage;
        }
        if (isset($parameters['page'])) {
            $page = $parameters['page'];
            $qrystring .= '&page='.urlencode($page);
            $qryarray['page'] = $page;
        }

        if (isset($url) && strlen($url) > 0) {
            $path = $url;
        }

        return array(
            'qrystring' => $qrystring,
            'path' => $path,
            'qryarray' => $qryarray,
        );
    }

    /**
     * oAuth API Authentication.
     * @return oAuth
     */
    private function oAuthDance()
    {
        $req_url        = 'https://oauth-api.beatport.com/identity/1/oauth/request-token';
        $authurl        = 'https://oauth-api.beatport.com/identity/1/oauth/authorize';
        $auth_submiturl = 'https://oauth-api.beatport.com/identity/1/oauth/authorize-submit';
        $acc_url        = 'https://oauth-api.beatport.com/identity/1/oauth/access-token';
        $http_request = new \HTTP_Request2(null, \HTTP_Request2::METHOD_GET, array(
            'ssl_verify_peer' => false,
            'ssl_verify_host' => false,
        ));
        $http_request->setHeader('Accept-Encoding', '.*');
        $consumer_request = new \HTTP_OAuth_Consumer_Request();
        $consumer_request->accept($http_request);
        $oauth = new \HTTP_OAuth_Consumer($this->params['consumerKey'], $this->params['consumerSecret']);
        $oauth->accept($consumer_request);
        $request_token_info         = $oauth->getRequestToken($req_url);
        $oauth_request_token        = $oauth->getToken();
        $oauth_request_token_secret = $oauth->getTokenSecret();
        $post_string = 'oauth_token='.$oauth_request_token.'&username='.$this->params['beatportLogin'].'&password='.$this->params['beatportPassword'].'&submit=Login';
        $curl_connection_bp = curl_init();
        curl_setopt($curl_connection_bp, CURLOPT_URL, $auth_submiturl);
        curl_setopt($curl_connection_bp, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl_connection_bp, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT6.0; en-US; rv:1.8.1.11) Gecko/20071127 Firefox/2.0.0.11');
        curl_setopt($curl_connection_bp, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl_connection_bp, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection_bp, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl_connection_bp, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl_connection_bp, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_connection_bp, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl_connection_bp, CURLOPT_VERBOSE, false);
        curl_setopt($curl_connection_bp, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($curl_connection_bp, CURLOPT_FAILONERROR, 0);
        curl_setopt($curl_connection_bp, CURLOPT_POST, true);
        curl_setopt($curl_connection_bp, CURLOPT_POSTFIELDS, $post_string);
        $beatport_response = curl_exec($curl_connection_bp);
        $oauth_exploded = array();
        parse_str($beatport_response, $oauth_exploded);
        curl_close($curl_connection_bp);
        $oauth->getAccessToken('https://oauth-api.beatport.com/identity/1/oauth/access-token', $oauth_exploded['oauth_verifier']);

        return $oauth;
    }

    public function queryApi($parameters)
    {
        $query    = $this->buildQuery($parameters);
        $path     = $query['path'];
        $qryarray = $query['qryarray'];
        $request  = $this->oauth->sendRequest('https://oauth-api.beatport.com/catalog/3/'.$path, $qryarray);
        $json     = $request->getBody();

        return json_decode($json, true);
    }
}
