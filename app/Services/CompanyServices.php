<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\CompanyModel;
use GuzzleHttp\Exception\GuzzleException;

class CompanyServices extends BaseServices implements ServicesInterface{


    /**
     * Returns all companies as array
     *
     * @param array $filter
     * @return array
     * @throws GuzzleException
     */
    public function getAll(array $filter = []): array
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::COMPANY_URI, $filter);
    }


    /**
     * Creates a new instance of the CompanyModel class
     *
     * @return CompanyModel
     */
    public function create(): CompanyModel
    {
        // TODO: Implement create() method.
        return new CompanyModel($this->client);
    }
}