<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Http\AmoHttpClient;
use App\Constants\UriConstants;

class BaseServices{
    protected $httpClient;
    protected $token;
    protected $client;

    /**
     * CompanyServices Class constructor
     *
     * @param AmoApiClient $amoClient
     */
    public function __construct(AmoApiClient $amoClient)
    {
        $this->client = $amoClient;
        $this->httpClient = new AmoHttpClient($this->client->apiUri, $this->client->getAccessToken());
    }
}