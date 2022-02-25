<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Http\AmoHttpClient;
use App\Constants\UriConstants;

class BaseServices{
    protected $httpClient;
    protected $token;

    /**
     * CompanyServices Class constructor
     *
     * @param string $uri
     * @param string $accessToken
     */
    public function __construct(AmoApiClient $client)
    {
        $this->httpClient = new AmoHttpClient($client->apiUri);
        $this->token = $client->getAccessToken();
    }
}