<?php

namespace App\Services;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\Company;

class CompanyServices extends BaseServices implements ServicesInterface{

    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    public function getAll($filter)
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::COMPANY_URI, $filter, $this->headers);
    }


    public function create(): Company
    {
        // TODO: Implement create() method.
        return new Company($this->httpClient, $this->headers);
    }
}