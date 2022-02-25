<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Http\AmoHttpClient;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;
use App\Model\ContactModel;

class ContactServices extends BaseServices implements ServicesInterface{

    /**
     * Returns all contact as array
     *
     * @param array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        // TODO: Implement getAll() method.
        if (trim(empty($filter))) {
            $filter = [];
        }
        return $this->httpClient->request("GET", UriConstants::CONTACT_URI_V2, $filter, $this->token);
    }


    /**
     * Creates a new instance of the ContactModel class
     *
     * @return ContactModel
     */
    public function create(): ContactModel
    {
        // TODO: Implement create() method.
        return new ContactModel($this->httpClient, $this->headers);
    }
}