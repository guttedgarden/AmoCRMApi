<?php

namespace App\Oauth;

use App\Http\AmoHttpClient;
use App\Constants\UriConstants;

class AmoOauth {

    /**
     * Internet protocol
     * @var string
     */
    private $protocol = 'https://';

    /**
     * Domain name extensions. Example *test*.amocrm.ru
     * @var string
     */
    public $subDomain;

    /**
     * @var string
     */
    private $baseDomain = '.amocrm.ru/';

    /**
     * Integration id
     * @var string
     */
    private $client_id;

    /**
     * Variable for storing the config
     * @var array
     */
    public $configJSON = [
        "access_token" => "",
        "refresh_token" => "",
        "expires_in" => 0,
        "begin_in" => 0,
    ];

    /**
     * Secret integration key
     * @var string
     */
    private $client_secret;

    /**
     * Path to config json file
     * @var string
     */
    private $pathToConfig;

    /**
     * Authorization code
     * @var string
     */
    private $code;

    /**
     * MUST match the redirect link in the integration
     * @var string
     */
    private $redirect_uri;

    /**
     * Full path with protocol, subdomain and domain
     * @var string
     */
    public $apiUri;

    /**
     * @var AmoHttpClient
     */
    private $httpClient;

    /**
     * AmoOauth Class constructor
     *
     * @param $subDomain
     * @param $client_id
     * @param $client_secret
     * @param $code
     * @param $redirect_uri
     * @param $pathToConfig
     */
    public function __construct($subDomain, $client_id, $client_secret, $code, $redirect_uri, $pathToConfig)
    {
        $this->subDomain = $subDomain;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->code = $code;
        $this->redirect_uri = $redirect_uri;
        $this->apiUri = "{$this->protocol}{$subDomain}{$this->baseDomain}";
        $this->pathToConfig = $pathToConfig;


        $this->httpClient = new AmoHttpClient($this->apiUri);
    }

    /**
     * Function for getting a token
     * @return array|void
     */
    public function getToken()
    {
        //If the config file exists and its lifetime has expired,
        //then the function to get a token by refresh_code is called.
        if (file_exists($this->pathToConfig)){
            $configString = file_get_contents($this->pathToConfig);
            $this->configJSON = json_decode($configString, true);
            if (time() >= $this->configJSON["expires_in"]){
                return $this->getTokenByRefreshCode();
            }
        } else { //If such a file does not exist,
                // then the function for obtaining a token by auth_code is called.
            return $this->getTokenByAuthCode();
        }
    }


    /**
     * Function for getting a token by authorization code
     * @return array
     */
    public function getTokenByAuthCode(): array
    {
        try {
            $responseJson = $this->httpClient->request("POST",UriConstants::OAUTH_URI,
                $this->requestJson(false), UriConstants::HEADERS_TOKEN);
        } catch (Exception $e){

        }

        if (!empty($responseJson)) {
            $this->writeJson($responseJson);
        }

        return $responseJson;
    }

    //

    /**
     * Function for getting a token by refresh code
     * @return array
     */
    public function getTokenByRefreshCode(): array
    {
        try {
            $responseJson = $this->httpClient->request("POST",UriConstants::OAUTH_URI,
                $this->requestJson(true), UriConstants::HEADERS_TOKEN);
        } catch (Exception $e){

        }

        if (!empty($responseJson)) {
            $this->writeJson($responseJson);
        }

        return $responseJson;
    }

    /**
     * Function for writing the received json from AmoApi
     * @param array $responseJson
     * @return void
     */
    private function writeJson(array $responseJson)
    {
        $this->configJSON = [
            "access_token"=>$responseJson["access_token"],
            "refresh_token"=>$responseJson["refresh_token"],
            "token_type"=>$responseJson["token_type"],
            "begin_in"=> time(),
            "expires_in"=> time() + $responseJson["expires_in"] - 1000
        ];
        file_put_contents($this->pathToConfig, json_encode($this->configJSON));
    }

    /**
     * @param bool $tokenType If true, refresh_token || if false, authorization_code
     * @return array
     */
    public function requestJson(bool $tokenType): array
    {
        return [
            "client_id" => $this->client_id,
            "client_secret" => $this->client_secret,
            "grant_type" => ($tokenType ? "refresh_token" : "authorization_code"),
            ($tokenType ? "refresh_token" : "code") => ($tokenType ? $this->configJSON["refresh_token"] : $this->code),
            "redirect_uri" => $this->redirect_uri
        ];
    }

}