<?php

namespace App\Services;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\Company;

class CompanyServices extends BaseServices implements ServicesInterface{

    /**
     * CompanyServices Class constructor
     *
     * @param string $uri
     * @param string $accessToken
     */
    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    /**
     * Returns all companies as array
     *
     * @param array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::COMPANY_URI, $filter, $this->headers);
    }


    /**
     * Creates a new instance of the Company class
     *
     * @return Company
     */
    public function create(): Company
    {
        // TODO: Implement create() method.
        return new Company($this->httpClient, $this->headers);
    }
}