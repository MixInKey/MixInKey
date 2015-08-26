<?php

class BeatportApi {

    private $oauth;

    public function __construct($parameters) {

        $conskey           = $parameters['consumer'];
        $conssec           = $parameters['secret'];
        $beatport_login    = $parameters['login'];
        $beatport_password = $parameters['password'];
        $this->oauth       = $this->oAuthDance($conskey, $conssec, $beatport_login, $beatport_password);
    }
    private function buildQuery($parameters) {

        $facets  = $parameters['facets'];
        $perPage = $parameters['perPage'];
        $url     = $parameters['url'];
        $qryarray = array();
        $qrystring = '';
        if (isset($facets)) {
            $qrystring .= '?facets=' . urlencode($facets);
            $qryarray['facets'] = $facets;
        }
        elseif (isset($id) && strlen($id) > 0) {
            $qrystring .= '?id=' . urlencode($id);
            $qryarray['id'] = $id;
        }
        else {
            throw new Exception ('Parameter missing');
        }
        if (isset($sortBy) && strlen($sortBy) > 0) {
            $qrystring .= '&sortBy=' . urlencode($sortBy);
            $qryarray['sortBy'] = $sortBy;
        }
        if (isset($perPage) && strlen($perPage) > 0) {
            $qrystring .= '&perPage=' . urlencode($perPage);
            $qryarray['perPage'] = $perPage;
        }
        if (isset($url) && strlen($url) > 0) {
            $path = $url;
        }
        return array(
            'qrystring' => $qrystring,
            'path' => $path,
            'qryarray' => $qryarray
        );
    }
    private function oAuthDance($conskey, $conssec, $beatport_login, $beatport_password) {

        $req_url        = 'https://oauth-api.beatport.com/identity/1/oauth/request-token';
        $authurl        = 'https://oauth-api.beatport.com/identity/1/oauth/authorize';
        $auth_submiturl = 'https://oauth-api.beatport.com/identity/1/oauth/authorize-submit';
        $acc_url        = 'https://oauth-api.beatport.com/identity/1/oauth/access-token';
        $http_request = new \HTTP_Request2(null, HTTP_Request2::METHOD_GET, array(
            'ssl_verify_peer' => false,
            'ssl_verify_host' => false
        ));
        $http_request->setHeader('Accept-Encoding', '.*');
        $consumer_request = new \HTTP_OAuth_Consumer_Request();
        $consumer_request->accept($http_request);
        $oauth = new \HTTP_OAuth_Consumer($conskey, $conssec);
        $oauth->accept($consumer_request);


        $request_token_info         = $oauth->getRequestToken($req_url);
        $oauth_request_token        = $oauth->getToken();
        $oauth_request_token_secret = $oauth->getTokenSecret();


        $post_string        = 'oauth_token=' . $oauth_request_token . '&username=' . $beatport_login . '&password=' . $beatport_password . '&submit=Login';
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
        //$curl_referer  = ( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
        //curl_setopt($curl_connection_bp, CURLOPT_REFERER, $curl_referer);
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
        $request  = $this->oauth->sendRequest('https://oauth-api.beatport.com/catalog/3/' . $path, $qryarray);
        $json     = $request->getBody();
        return json_decode($json, true);
    }
}
