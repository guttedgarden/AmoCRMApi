<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\CustomerModel;

class CustomerServices extends BaseServices implements ServicesInterface{

    /**
     * Returns all customers as array
     *
     * @param array $filter
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(array $filter): array
    {
        // TODO: Implement getAll() method.
        if(trim(empty($filter))){
            $filter = [];
        }
        return $this->httpClient->request("GET", UriConstants::CUSTOMER_URI, $filter, $this->headers);
    }

    /**
     * Creates a new instance of the CustomerModel class
     *
     * @return CustomerModel
     */
    public function create(): CustomerModel
    {
        // TODO: Implement create() method.
        return new CustomerModel($this->httpClient, $this->token);
    }
}