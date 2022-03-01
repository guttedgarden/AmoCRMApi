<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\CustomerModel;
use GuzzleHttp\Exception\GuzzleException;

class CustomerServices extends BaseServices implements ServicesInterface{

    /**
     * Returns all customers as array
     *
     * @param array $filter
     * @return array
     * @throws GuzzleException
     */
    public function getAll(array $filter = []): array
    {
        return $this->httpClient->request("GET", UriConstants::CUSTOMER_URI, $filter);
    }

    /**
     * Creates a new instance of the CustomerModel class
     *
     * @return CustomerModel
     */
    public function create(): CustomerModel
    {
        // TODO: Implement create() method.
        return new CustomerModel($this->client);
    }
}